import 'dart:convert';
import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'package:flutter_secure_storage/flutter_secure_storage.dart';
import 'package:challange_kide/widgets/signIn.dart';
import 'package:shared_preferences/shared_preferences.dart';
import 'package:path/path.dart' as p;
final FlutterSecureStorage _storage = FlutterSecureStorage();
final String baseUrl = 'https://10.0.2.2:8000';
class ApiService {
  Future<List<Challenge>> fetchChallenges() async {
    final response = await http.get(Uri.parse('$baseUrl/api/challenge'));

    if (response.statusCode == 200) {
      List<dynamic> data = json.decode(response.body);
      return data.map((json) => Challenge.fromJson(json)).toList();
    } else {
      throw Exception('Failed to load challenges');
    }
  }

  Future<List<Category>> fetchCategories() async {
    final response = await http.get(Uri.parse('$baseUrl/api/category'));

    if (response.statusCode == 200) {
      List<dynamic> data = json.decode(response.body);
      return data.map((json) => Category.fromJson(json)).toList();
    } else {
      throw Exception('Failed to load Categories');
    }
  }

  Future<List<Chapter>> fetchChapters() async {
    final response = await http.get(Uri.parse('$baseUrl/api/chapter'));

    if (response.statusCode == 200) {
      List<dynamic> data = json.decode(response.body);
      return data.map((json) => Chapter.fromJson(json)).toList();
    } else {
      throw Exception('Failed to load Chapters');
    }
  }

  Future<List<Lesson>> fetchLessons() async {
    final response = await http.get(Uri.parse('$baseUrl/api/lesson'));

    if (response.statusCode == 200) {
      List<dynamic> data = json.decode(response.body);
      return data.map((json) => Lesson.fromJson(json)).toList();
    } else {
      throw Exception('Failed to load Lessons');
    }
  }

  Future<bool> login(String email, String password) async {
    final response = await http.post(
      Uri.parse('$baseUrl/api/login_check'),
      headers: {'Content-Type': 'application/json'},
      body: json.encode({'email': email, 'password': password}),
    );

    if (response.statusCode == 200) {
      final data = json.decode(response.body);
      final token =
          data['token']; // Assuming the token is returned in the 'token' field

      if (token != null && token.isNotEmpty) {
        // Save the token in SharedPreferences or any other secure storage
        final prefs = await SharedPreferences.getInstance();
        await prefs.setString('auth_token', token);
        await _storage.write(
          key: 'token',
          value: token,
        );
        return true;
      } else {
        return false; // Token is null or empty, login failed
      }
    } else {
      throw Exception('Failed to log in');
    }
  }

  Future<bool> _isUserLoggedIn() async {
    // Check if the user is logged in by reading the value from secure storage
    String? loggedIn = await _storage.read(key: 'loggedIn');
    return loggedIn == 'true';
  }

  Future<bool> register(String username, String email, String password,
      String gender, String birthday) async {
    try {
      final response = await http.post(
        Uri.parse('$baseUrl/api/register'),
        headers: {'Content-Type': 'application/json'},
        body: json.encode({
          'fullName': username,
          'email': email,
          'plainPassword': password,
          'birthDate': birthday,
          'gender': gender,
        }),
      );

      print('Response status: ${response.statusCode}');
      print('Response body: ${response.body}');

      if (response.statusCode == 200) {
        final data = json.decode(response.body);
        // Adjust this according to your API's actual response
        return data['success'] ?? false;
      } else {
        print('Failed to register. Status code: ${response.statusCode}');
        return false;
      }
    } catch (e) {
      print('Error during registration: $e');
      return false;
    }
  }


Future<List<Post>> fetchUserPosts() async {
  try {
    // Retrieve the token from secure storage
    final token = await _storage.read(key: 'token');
    if (token == null) {
      throw Exception('Token not found');
    }

    // Make the HTTP GET request with authorization header
    final response = await http.get(
      Uri.parse('$baseUrl/api/post/user'), // Update with the correct URL
      headers: {
        'Content-Type': 'application/json',
        'Authorization': 'Bearer $token', // Include the token in the Authorization header
      },
    );

    if (response.statusCode == 200) {
      List<dynamic> data = json.decode(response.body);
      return data.map((json) => Post.fromJson(json)).toList();
    } else {
      throw Exception('Failed to load user posts');
    }
  } catch (e) {
    print('Error fetching user posts: $e');
    throw Exception('Error fetching user posts');
  }
}

}

final storage = FlutterSecureStorage();

Future<String?> getToken() async {
  return await storage.read(key: 'token');
}

Future<bool> refreshToken() async {
  try {
    final refreshToken = await storage.read(key: 'token');
    final response = await http.post(
      Uri.parse('$baseUrl/api/auth/refresh-token'), // Update with the correct URL
      headers: {'Content-Type': 'application/json'},
      body: json.encode({'token': refreshToken}),
    );

    if (response.statusCode == 200) {
      final data = json.decode(response.body);
      await storage.write(key: 'token', value: data['token']);
      return true;
    } else {
      print('Failed to refresh token. Status code: ${response.statusCode}');
      return false;
    }
  } catch (e) {
    print('Error during token refresh: $e');
    return false;
  }
}







Future<bool> upload(int challengeId, String title, String description, String mediaFilePath) async {
  print('Uploading file: ${p.basename(mediaFilePath)}');
  try {
    String? token = await getToken();

    // Check if title and description are provided
    if (title.isEmpty || description.isEmpty) {
      print('Title or description is empty.');
      return false;
    }

    // Create a MultipartRequest
    final request = http.MultipartRequest(
      'POST',
      Uri.parse('$baseUrl/api/kid/postchallenge/$challengeId'),
    )
      ..headers['Authorization'] = 'Bearer $token'
      ..fields['title'] = title
      ..fields['content'] = description
      ..files.add(await http.MultipartFile.fromPath(
        'mediaFileName',
        mediaFilePath,
      ));

    // Send the request
    final response = await request.send();

    // Check the response
    final responseBody = await response.stream.bytesToString();
    if (response.statusCode == 401) {
      bool refreshed = await refreshToken();
      if (refreshed) {
        token = await getToken();
        final retryRequest = http.MultipartRequest(
          'POST',
          Uri.parse('$baseUrl/api/kid/postchallenge/$challengeId'),
        )
          ..headers['Authorization'] = 'Bearer $token'
          ..fields['title'] = title
          ..fields['content'] = description
          ..files.add(await http.MultipartFile.fromPath(
            'mediaFileName',
            mediaFilePath,
          ));

        final retryResponse = await retryRequest.send();
        final retryResponseBody = await retryResponse.stream.bytesToString();

        if (retryResponse.statusCode == 200) {
          print('Upload successful.');
          return true;
        } else {
          print('Failed to upload after token refresh. Status code: ${retryResponse.statusCode}');
          print('Response Body: $retryResponseBody');
          return false;
        }
      } else {
        print('Failed to refresh token.');
        // Optional: Log out the user or prompt them to log in again
        return false;
      }
    }

    if (response.statusCode == 200) {
      print('Response Data: $responseBody');
      final data = json.decode(responseBody);
      return data['success'] ?? false;
    } else {
      print('Failed to upload. Status code: ${response.statusCode}');
      print('Response Body: $responseBody');
      return false;
    }
  } catch (e) {
    print('Error during uploading: $e');
    return false;
  }
}





Future<void> logout(BuildContext context) async {
  try {
    final FlutterSecureStorage _storage = FlutterSecureStorage();
    // Clear all keys
    await _storage.deleteAll();

    // Optionally, navigate to the login screen
    Navigator.pushReplacement(
      context,
      MaterialPageRoute(builder: (context) => SignInScreen()),
    );
  } catch (e) {
    print('Error during logout: $e');
  }
}

Future<String> getUserName() async {
  const key = 'token'; // Key to retrieve token
  final storage = FlutterSecureStorage();
  final token = await storage.read(key: "token");

  if (token == null) {
    return 'Authorization token not found.';
  }

  try {
    final response = await http.get(
      Uri.parse('$baseUrl/api/kid/profile'), // Adjust URL to your API endpoint
      headers: {
        'Content-Type': 'application/json',
        'Authorization': 'Bearer $token', // Include the token in the Authorization header
      },
    );

    if (response.statusCode == 200) {
      final data = json.decode(response.body);
      final userName = data['fullName']; // Adjust to match your API response structure
      return userName ?? 'User Name not found.';
    } else {
      return 'Failed to fetch user name.';
    }
  } catch (e) {
    print('Error fetching user name: $e');
    return 'Error retrieving user name.';
  }
}




class Challenge {
  final int id;
  final String title;
  final String description;
  final String imageFileName;
  final int? kid;
  final int coach;
  final List<Category> categories;
  final List<Chapter> chapters;

  Challenge({
    required this.id,
    required this.title,
    required this.description,
    required this.imageFileName,
    this.kid,
    required this.coach,
    required this.categories,
    required this.chapters,
  });

  factory Challenge.fromJson(Map<String, dynamic> json) {
    return Challenge(
      id: json['id'],
      title: json['title'],
      description: json['description'],
      imageFileName: json['imageFileName'],
      kid: json['kid'],
      coach: json['coach'],
      categories: (json['categories'] as List)
          .map((category) => Category.fromJson(category))
          .toList(),
      chapters: (json['chapters'] as List)
          .map((chapter) => Chapter.fromJson(chapter))
          .toList(),
    );
  }
}

// lib/models/category.dart
class Category {
  final int id;
  final String title;
  final String description;

  Category({
    required this.id,
    required this.title,
    required this.description,
  });

  factory Category.fromJson(Map<String, dynamic> json) {
    return Category(
      id: json['id'],
      title: json['title'],
      description: json['description'],
    );
  }
}

// lib/models/chapter.dart
class Chapter {
  final int id;
  final String title;
  final String description;
  final int chapterNumber;
  final List<Lesson> lessons;

  Chapter({
    required this.id,
    required this.title,
    required this.description,
    required this.chapterNumber,
    required this.lessons,
  });

  factory Chapter.fromJson(Map<String, dynamic> json) {
    return Chapter(
      id: json['id'],
      title: json['title'],
      description: json['description'],
      chapterNumber: json['chapterNumber'],
      lessons: (json['lessons'] as List)
          .map((lesson) => Lesson.fromJson(lesson))
          .toList(),
    );
  }

  get chapter => null;
}

// lib/models/lesson.dart
class Lesson {
  final int id;
  final String title;
  final String description;
  final int lessonNumber;
  final Post post; // Include Post instance

  Lesson({
    required this.id,
    required this.title,
    required this.description,
    required this.lessonNumber,
    required this.post,
  });

  factory Lesson.fromJson(Map<String, dynamic> json) {
    return Lesson(
      id: json['id'],
      title: json['title'],
      description: json['description'],
      lessonNumber: json['lessonNumber'],
      post: Post.fromJson(json['post'] ?? {}), // Handle null or missing post
    );
  }

  String get mediaFileName => post.mediaFileName; // Access mediaFileName from Post
}

// lib/models/post.dart
class Post {
  final int id;
  final String title;
  final String content;
  final String mediaFileName;
  final String approved;

  Post({
    required this.id,
    required this.title,
    required this.content,
    required this.mediaFileName,
    required this.approved,
  });

  factory Post.fromJson(Map<String, dynamic> json) {
    return Post(
      id: json['id'],
      title: json['title'],
      content: json['content'],
      mediaFileName: json['mediaFileName'] ?? '',
      approved: json['approved'] ?? '',
    );
  }
}
