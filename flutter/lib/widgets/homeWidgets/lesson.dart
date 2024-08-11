import 'dart:io';

import 'package:challange_kide/services/api_service.dart';
import 'package:flutter/material.dart';
import 'package:image_picker/image_picker.dart';

import 'chapter.dart';

File? selectImage;

class lessonScreen extends StatefulWidget {
  final Lesson lesson;

  const lessonScreen({super.key, required this.lesson});

  @override
  _lessonScreenState createState() => _lessonScreenState();
}

class _lessonScreenState extends State<lessonScreen> {

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Colors.white,
      appBar: PreferredSize(
        preferredSize: const Size.fromHeight(100.0),
        child: Padding(
          padding: const EdgeInsets.only(top: 20),
          child: SizedBox(
            width: double.infinity,
            child: AppBar(
              backgroundColor: Colors.white,
              leading: Padding(
                padding: const EdgeInsets.only(left: 15.0),
                child: SizedBox(
                  width: 60,
                  height: 60,
                  child: TextButton(
                    onPressed: () {
                      Navigator.pop(context);
                    },
                    style: TextButton.styleFrom(
                      backgroundColor: const Color.fromRGBO(61, 143, 239, 1),
                      shape: RoundedRectangleBorder(
                        borderRadius: BorderRadius.circular(12),
                      ),
                      padding: EdgeInsets.zero,
                    ),
                    child: const Icon(
                      Icons.keyboard_arrow_left,
                      color: Colors.white,
                      size: 30,
                    ),
                  ),
                ),
              ),
              title: const Align(
                alignment: Alignment.center,
                child: Text(
                  'Lesson',
                  style: TextStyle(
                    fontSize: 25,
                    fontWeight: FontWeight.bold,
                  ),
                ),
              ),
              actions: [Container(width: 48)],
            ),
          ),
        ),
      ),
      body: SingleChildScrollView(
        child: Column(
          mainAxisSize: MainAxisSize.min,
          children: [
            Padding(
              padding: const EdgeInsets.all(8.0),
              child: SizedBox(
                height: 250,
                width: double.infinity,
                child: Container(
                  padding: const EdgeInsets.all(16.0),
                  decoration: BoxDecoration(
                    color: Colors.white,
                    borderRadius: BorderRadius.circular(12),
                    boxShadow: const [
                      BoxShadow(
                        color: Colors.black26,
                        blurRadius: 4,
                        offset: Offset(0, 2),
                      ),
                    ],
                    image: DecorationImage(
                      // Ensure this path is correct based on your Lesson class
        image: NetworkImage(
          'https://10.0.2.2:8000/uploads/images/${widget.lesson.mediaFileName}',
        ),

                      fit: BoxFit.cover,
                      onError: (error, stackTrace) {
                        // Handle the error here
                        print('Error loading image: $error');
                      },
                    ),

                  ),
                ),
              ),
            ),
            Padding(
              padding: const EdgeInsets.symmetric(horizontal: 20.0, vertical: 8.0),
              child: Align(
                alignment: Alignment.centerLeft,
                child: Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                    Text(
                      widget.lesson.title,
                      style: const TextStyle(fontSize: 20, fontWeight: FontWeight.w700),
                    ),
                    const SizedBox(height: 10),
                    Text(
                      widget.lesson.description,
                      style: const TextStyle(fontSize: 15),
                    ),
                  ],
                ),
              ),
            ),
          ],
        ),
      ),
    );
  }
}
