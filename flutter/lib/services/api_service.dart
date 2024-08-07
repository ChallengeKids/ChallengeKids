// lib/services/api_service.dart
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
