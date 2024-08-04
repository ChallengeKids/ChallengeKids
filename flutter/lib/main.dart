import 'package:flutter/material.dart';
import 'widgets/signIn.dart';
import 'widgets/signUp.dart';
import 'widgets/home.dart';
void main() {
  runApp(MyApp());
}

class MyApp extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return const MaterialApp(
      home: GoogleBottomBar(),
      debugShowCheckedModeBanner: false,
    );
  }
}
