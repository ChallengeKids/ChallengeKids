import 'package:challange_kide/services/api_service.dart';
import 'package:flutter/material.dart';

class ChallengeScreen extends StatelessWidget {
  final Challenge challenge;

  const ChallengeScreen({super.key, required this.challenge});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: PreferredSize(
        preferredSize:
            const Size.fromHeight(100.0), // Set the desired height here
        child: Padding(
          padding: const EdgeInsets.only(top: 20),
          child: Container(
            width: double.infinity, // Make the container span the full width
            child: AppBar(
              backgroundColor:
                  const Color.fromARGB(255, 255, 255, 255), // Remove shadow
              leading: Padding(
                padding: const EdgeInsets.only(left: 15.0),
                child: Container(
                  width: 60, // Desired width
                  height: 60, // Height to match width or desired size
                  child: TextButton(
                    onPressed: () {
                      Navigator.pop(
                          context); // This will navigate back to the previous page
                    },
                    style: TextButton.styleFrom(
                      backgroundColor: const Color.fromRGBO(61, 143, 239, 1),
                      shape: RoundedRectangleBorder(
                        borderRadius: BorderRadius.circular(12),
                      ),
                      padding: EdgeInsets.zero, // Remove default padding
                    ),
                    child: const Icon(
                      Icons.keyboard_arrow_left,
                      color: Colors.white,
                      size: 30, // Icon size
                    ),
                  ),
                ),
              ),
              title: const Align(
                alignment: Alignment.center,
                child: Text(
                  'Challenges',
                  style: TextStyle(
                    fontSize: 25,
                    fontWeight: FontWeight.bold,
                  ),
                ),
              ),
              actions: [
                // Empty container to keep title centered
                Container(width: 48), // Adjust width as needed
              ],
            ),
          ),
        ),
      ),
      body: Column(
        children: [
          // Event announcement
          Padding(
            padding: const EdgeInsets.all(8.0),
            child: SizedBox(
              height: 180,
              width: 380, // Adjust the width as needed
              child: Container(
                padding: const EdgeInsets.all(16.0),
                decoration: BoxDecoration(
                  color: const Color.fromRGBO(172, 215, 255, 1),
                  borderRadius: BorderRadius.circular(12), // Rounded border
                  boxShadow: const [
                    BoxShadow(
                      color: Colors.black26,
                      blurRadius: 4,
                      offset: Offset(0, 2),
                    ),
                  ],
                  image: DecorationImage(
                    image: NetworkImage(
                        'http://127.0.0.1:8000/uploads/images/${challenge.imageFileName}'), // Background image
                    fit: BoxFit.cover, // Adjust the fit as needed
                  ),
                ),
                child: const Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                    SizedBox(height: 16), // Add space between image and text
                  ],
                ),
              ),
            ),
          ),
          // Challenge title and details
          Padding(
            padding:
                const EdgeInsets.symmetric(horizontal: 20.0, vertical: 8.0),
            child: Align(
              alignment: Alignment.centerLeft,
              child: Column(
                crossAxisAlignment: CrossAxisAlignment.start,
                children: [
                  Text(
                    challenge.title,
                    style: const TextStyle(
                        fontSize: 20, fontWeight: FontWeight.w700),
                  ),
                  const SizedBox(
                      height: 10), // Add space between the title and the row
                  Text(
                    challenge.description,
                    style: const TextStyle(fontSize: 15),
                  ),
                ],
              ),
            ),
          ),
          // List of chapters
          Expanded(
            child: ListView.builder(
              itemCount: challenge.chapters.length,
              itemBuilder: (context, index) {
                final chapter = challenge.chapters[index];
                return Container(
                  margin:
                      const EdgeInsets.symmetric(horizontal: 16, vertical: 8.0),
                  decoration: BoxDecoration(
                    color: const Color.fromRGBO(234, 244, 255, 1),
                    border: Border.all(color: const Color(0xFFE0E0E0)),
                    borderRadius: BorderRadius.circular(8.0),
                  ),
                  child: Padding(
                    padding: const EdgeInsets.all(8.0),
                    child: Row(
                      crossAxisAlignment: CrossAxisAlignment.start,
                      children: [
                        // Circular Icon with background
                        Container(
                          margin: const EdgeInsets.only(
                              right: 16.0), // Adjusted margin for more space
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
                          child: Column(
                            crossAxisAlignment: CrossAxisAlignment.start,
                            children: [
                              Text(
                                chapter.title,
                                style: const TextStyle(
                                  fontWeight: FontWeight.bold,
                                  fontSize: 16,
                                ),
                                maxLines: 2,
                                overflow: TextOverflow.ellipsis,
                              ),
                              const SizedBox(height: 8),
                              Text(
                                chapter.description,
                                style: const TextStyle(
                                  fontSize: 12,
                                ),
                                maxLines: 2,
                                overflow: TextOverflow.ellipsis,
                              ),
                            ],
                          ),
                        ),
                        const SizedBox(
                            width: 20), // Space between text and button
                        // Learn More Button
                        SizedBox(
                          height: 50,
                          width: 50,
                          child: TextButton(
                            onPressed: () {
                              // Handle Learn More button tap
                            },
                            style: TextButton.styleFrom(
                              backgroundColor:
                                  const Color.fromRGBO(61, 143, 239, 1),
                              shape: RoundedRectangleBorder(
                                borderRadius: BorderRadius.circular(8),
                              ),
                            ),
                            child: const Center(
                              child: Icon(
                                Icons.keyboard_arrow_right,
                                color: Colors.white,
                                size: 30,
                              ),
                            ),
                          ),
                        ),
                      ],
                    ),
                  ),
                );
              },
            ),
          ),
        ],
      ),
      bottomNavigationBar: BottomAppBar(
        child: Container(
          height: 60.0,
          decoration: const BoxDecoration(
            color: Color.fromRGBO(61, 143, 239, 1),
            borderRadius: BorderRadius.only(
              topLeft: Radius.circular(16.0), // Adjust the radius as needed
              topRight: Radius.circular(16.0), // Adjust the radius as needed
            ),
          ),
          child: const Center(
            child: Text(
              'Enroll Now',
              style: TextStyle(
                fontSize: 20,
                fontWeight: FontWeight.bold,
                color: Colors.white, // White text color
              ),
            ),
          ),
        ),
      ),
    );
  }
}
