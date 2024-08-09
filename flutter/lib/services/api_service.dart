import 'dart:convert';
import 'package:http/http.dart' as http;

class ApiService {
  final String baseUrl = 'https://10.0.2.2:8000';

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
      return true;//data['success'] ?? false; // Check if 'success' key exists and return its value
    } else {
      throw Exception('Failed to log in');
    }
  }
  Future<bool> register(String username, String email, String password) async {
    try {
      final response = await http.post(
        Uri.parse('$baseUrl/api/register'),
        headers: {'Content-Type': 'application/json'},
        body: json.encode({
          'fullName': username,
          'email': email,
          'plainPassword': password,
          'confirmPassword': password,
        }),
      );

      print('Response status: ${response.statusCode}');
      print('Response body: ${response.body}');

      if (response.statusCode == 200) {
        final data = json.decode(response.body);
        // Adjust this according to your API's actual response
        return true;//data['success'] ?? false; 
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
