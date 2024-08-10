import 'dart:convert';
import 'dart:io';
import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'package:flutter_secure_storage/flutter_secure_storage.dart';
import 'package:challange_kide/widgets/signIn.dart';
import 'package:shared_preferences/shared_preferences.dart';

class ApiService {
  final String baseUrl = 'https://10.0.2.2:8000';
  final FlutterSecureStorage _storage = FlutterSecureStorage();
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
    final token = data['token']; // Assuming the token is returned in the 'token' field

    if (token != null && token.isNotEmpty) {
      // Save the token in SharedPreferences or any other secure storage
      final prefs = await SharedPreferences.getInstance();
      await prefs.setString('auth_token', token);
      await _storage.write(key: 'token', value: token,);
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
  Future<bool> register(String username, String email, String password, String gender, String birthday) async {
    try {
      final response = await http.post(
        Uri.parse('$baseUrl/api/register'),
        headers: {'Content-Type': 'application/json'},
        body: json.encode({
          'fullName': username,
          'email': email,
          'plainPassword': password,
          'birthDate':birthday,
          'gender':gender,
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
  const key = 'user_name';
  final storage = FlutterSecureStorage();

  try {
    String? userName = await storage.read(key: "email");
    print(userName);
    if (userName != null) {
      return userName;
    } else {
      return 'User Name not found.';
    }
  } catch (e) {
    print('Error reading user name: $e');
    return 'Error retrieving user name.';
  }
}







// lib/models/challenge.dart
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
}

// lib/models/lesson.dart
class Lesson {
  final int id;
  final String title;
  final String description;
  final int lessonNumber;

  Lesson({
    required this.id,
    required this.title,
    required this.description,
    required this.lessonNumber,
  });

  factory Lesson.fromJson(Map<String, dynamic> json) {
    return Lesson(
      id: json['id'],
      title: json['title'],
      description: json['description'],
      lessonNumber: json['lessonNumber'],
    );
  }
}
