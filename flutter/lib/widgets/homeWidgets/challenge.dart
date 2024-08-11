import 'package:challange_kide/services/api_service.dart';
import 'package:flutter/material.dart';

import 'chapter.dart';

class challengeScreen extends StatelessWidget {
  final Challenge challenge;

  const challengeScreen({super.key, required this.challenge});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: Stack(
        children: [
          // Background Image
          Positioned(
            top: 0,
            left: 0,
            right: 0,
            child: Container(
              width: double.infinity,
              height: 300,
              decoration: BoxDecoration(
                borderRadius:
                    const BorderRadius.vertical(
                        top: Radius.circular(8.0)),
                image: DecorationImage(
                  fit: BoxFit.cover,
                  image: NetworkImage(
                      'https://10.0.2.2:8000/uploads/images/${challenge.imageFileName}'),
                ),
              ),
            ),
          ),
          // Back Button
          Positioned(
            top: 30,
            left: 15,
            child: IconButton(
              icon: const Icon(Icons.arrow_back, color: Colors.white), // Back icon
              onPressed: () {
                Navigator.pop(context); // Navigate back
              },
            ),
          ),
          // Main Content
          Positioned(
            top: 200, // Position below the background image
            left: 0,
            right: 0,
            bottom: 0, // Extend to the bottom of the screen
            child: Container(
              width: MediaQuery.of(context).size.width,
              decoration: const BoxDecoration(
                color: Color.fromARGB(255, 255, 255, 255),
                borderRadius: BorderRadius.only(
                  topLeft: Radius.circular(40),
                  topRight: Radius.circular(40),
                ),
              ),
              child: Padding(
                padding: const EdgeInsets.all(8.0),
                child: Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                    Padding(
                      padding: const EdgeInsets.symmetric(
                          horizontal: 20.0, vertical: 8.0),
                      child: Column(
                        crossAxisAlignment: CrossAxisAlignment.start,
                        children: [
                          Text(
                            challenge.title,
                            style: const TextStyle(
                                fontSize: 30, fontWeight: FontWeight.w700),
                            textAlign: TextAlign.left,
                          ),
                          const SizedBox(height: 10),
                          Text(
                            challenge.description,
                            style: const TextStyle(fontSize: 15),
                            textAlign: TextAlign.left,
                          ),
                          const SizedBox(height: 20),
                          Row(
                            mainAxisAlignment: MainAxisAlignment.start,
                            crossAxisAlignment: CrossAxisAlignment.center,
                            children: [
                              Container(
                                width: 36,
                                height: 36,
                                decoration: const BoxDecoration(
                                  color: Colors.blue,
                                  shape: BoxShape.circle,
                                ),
                                child: const Icon(
                                  Icons.person,
                                  size: 24,
                                  color: Colors.white,
                                ),
                              ),
                              const SizedBox(width: 8),
                              const Text(
                                'Aziz Chandoul',
                                style: TextStyle(
                                    fontSize: 16, fontWeight: FontWeight.w500),
                              ),
                            ],
                          ),
                          const SizedBox(height: 15),
                          // Center the time and number info
                          const Row(
                            mainAxisAlignment: MainAxisAlignment.center,
                            children: [
                              SizedBox(width: 4),
                              Text(
                                "Chapters",
                                style: TextStyle(
                                    fontSize: 30, fontWeight: FontWeight.w700),
                                textAlign: TextAlign.center,
                              ),
                              const SizedBox(width: 20),
                            ],
                          ),
                        ],
                      ),
                    ),
                    Expanded(
                      child: ListView.builder(
                        padding: EdgeInsets.zero,
                        itemCount: challenge.chapters.length,
                        itemBuilder: (context, index) {
                          final chapter = challenge.chapters[index];
                          return Container(
                            margin: const EdgeInsets.symmetric(
                                horizontal: 16, vertical: 4.0),
                            decoration: BoxDecoration(
                              color: const Color.fromRGBO(234, 244, 255, 1),
                              border:
                                  Border.all(color: const Color(0xFFE0E0E0)),
                              borderRadius: BorderRadius.circular(8.0),
                              boxShadow: const [
                                BoxShadow(
                                  color: Colors.black26,
                                  blurRadius: 4.0,
                                  offset: Offset(0, 2),
                                ),
                              ],
                            ),
                            child:Padding(
                            padding: const EdgeInsets.all(8.0),
                            child: Row(
                              crossAxisAlignment: CrossAxisAlignment.center, // Center children vertically
                              children: [
                                Container(
                                  margin: const EdgeInsets.only(right: 16.0),
                                  width: 50,
                                  height: 50,
                                  decoration: const BoxDecoration(
                                    color: Color.fromRGBO(61, 143, 239, 1),
                                    shape: BoxShape.circle,
                                  ),
                                  child: IconButton(
                                    icon: const Icon(
                                      size: 30,
                                      Icons.play_lesson_outlined,
                                      color: Colors.white,
                                    ),
                                    onPressed: () {
                                      // Handle icon button tap
                                    },
                                  ),
                                ),
                                Expanded(
                                  child: Align(
                                    alignment: Alignment.centerLeft, // Align text to the left and center vertically
                                    child: Text(
                                      chapter.title,
                                      style: const TextStyle(
                                        fontWeight: FontWeight.bold,
                                        fontSize: 20,
                                      ),
                                      maxLines: 2,
                                      overflow: TextOverflow.ellipsis,
                                    ),
                                  ),
                                ),
                                const SizedBox(width: 20),
                                SizedBox(
                                  height: 50,
                                  width: 50,
                                  child: TextButton(
                                    onPressed: () {
                                      Navigator.push(
                                context,
                                MaterialPageRoute(
                                  builder: (context) => chapterScreen(chapter: chapter),
                                ),
                              );
                                    },
                                    style: TextButton.styleFrom(
                                      backgroundColor: const Color.fromRGBO(61, 143, 239, 1),
                                      shape: RoundedRectangleBorder(
                                        borderRadius: BorderRadius.circular(8),
                                      ),
                                      padding: EdgeInsets.zero,
                                    ),
                                    child: const Align(
                                      alignment: Alignment.center,
                                      child: Icon(
                                        Icons.play_circle_rounded,
                                        color: Colors.white,
                                        size: 30,
                                      ),
                                    ),
                                  ),
                                ),
                              ],
                            ),
                          )

                          );
                        },
                      ),
                    ),
                  ],
                ),
              ),
            ),
          ),
        ],
      ),
    );
  }
}
