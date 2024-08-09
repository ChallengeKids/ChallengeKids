import 'package:flutter/material.dart';
import 'package:flutter_secure_storage/flutter_secure_storage.dart';
import 'package:challange_kide/services/api_service.dart';
import 'signIn.dart';

class SignUpScreen extends StatefulWidget {
  @override
  _SignUpScreenState createState() => _SignUpScreenState();
}

class _SignUpScreenState extends State<SignUpScreen> {
  final _formKey = GlobalKey<FormState>();
  final _usernameController = TextEditingController();
  final _passwordController = TextEditingController();
  final _emailController = TextEditingController();
  final FlutterSecureStorage _storage = FlutterSecureStorage();
  final ApiService _apiService = ApiService();

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('Sign Up'),
      ),
      body: SingleChildScrollView(
        child: Center(
          child: Padding(
            padding: const EdgeInsets.all(16.0),
            child: Column(
              children: [
                Image.asset(
                  'image/kids.png',
                  height: 200,
                ),
                SizedBox(height: 30),
                Container(
                  padding: EdgeInsets.all(16.0),
                  decoration: BoxDecoration(
                    color: Colors.white,
                    borderRadius: BorderRadius.circular(12.0),
                    boxShadow: [
                      BoxShadow(
                        color: Colors.grey.withOpacity(0.2),
                        spreadRadius: 5,
                        blurRadius: 7,
                        offset: Offset(0, 3),
                      ),
                    ],
                  ),
                  child: Column(
                    children: [
                      Text(
                        'Sign Up',
                        style: TextStyle(fontSize: 40, fontWeight: FontWeight.w700),
                      ),
                      SizedBox(height: 10),
                      const Text(
                        'Welcome! Please fill in the information below.',
                        style: TextStyle(fontSize: 16),
                      ),
                      SizedBox(height: 20),
                      Form(
                        key: _formKey,
                        child: Column(
                          children: [
                            TextFormField(
                              controller: _usernameController,
                              decoration: InputDecoration(
                                labelText: 'Username',
                                labelStyle: TextStyle(color: Colors.blueGrey),
                                hintText: 'Enter your username',
                                hintStyle: TextStyle(color: Colors.grey[600]),
                                border: OutlineInputBorder(
                                  borderRadius: BorderRadius.circular(12.0),
                                ),
                                focusedBorder: OutlineInputBorder(
                                  borderRadius: BorderRadius.circular(12.0),
                                  borderSide: BorderSide(color: Colors.blue, width: 2.0),
                                ),
                                enabledBorder: OutlineInputBorder(
                                  borderRadius: BorderRadius.circular(12.0),
                                  borderSide: BorderSide(color: Colors.grey, width: 1.0),
                                ),
                              ),
                              validator: (value) {
                                if (value == null || value.isEmpty) {
                                  return 'Please enter your username';
                                }
                                return null;
                              },
                            ),
                            SizedBox(height: 20),
                            TextFormField(
                              controller: _passwordController,
                              decoration: InputDecoration(
                                labelText: 'Password',
                                labelStyle: TextStyle(color: Colors.blueGrey),
                                hintText: 'Enter your password',
                                hintStyle: TextStyle(color: Colors.grey[600]),
                                border: OutlineInputBorder(
                                  borderRadius: BorderRadius.circular(12.0),
                                ),
                                focusedBorder: OutlineInputBorder(
                                  borderRadius: BorderRadius.circular(12.0),
                                  borderSide: BorderSide(color: Colors.blue, width: 2.0),
                                ),
                                enabledBorder: OutlineInputBorder(
                                  borderRadius: BorderRadius.circular(12.0),
                                  borderSide: BorderSide(color: Colors.grey, width: 1.0),
                                ),
                              ),
                              obscureText: true,
                              validator: (value) {
                                if (value == null || value.isEmpty) {
                                  return 'Please enter your password';
                                }
                                return null;
                              },
                            ),
                            SizedBox(height: 20),
                            TextFormField(
                              controller: _emailController,
                              decoration: InputDecoration(
                                labelText: 'Email',
                                labelStyle: TextStyle(color: Colors.blueGrey),
                                hintText: 'Enter your email',
                                hintStyle: TextStyle(color: Colors.grey[600]),
                                border: OutlineInputBorder(
                                  borderRadius: BorderRadius.circular(12.0),
                                ),
                                focusedBorder: OutlineInputBorder(
                                  borderRadius: BorderRadius.circular(12.0),
                                  borderSide: BorderSide(color: Colors.blue, width: 2.0),
                                ),
                                enabledBorder: OutlineInputBorder(
                                  borderRadius: BorderRadius.circular(12.0),
                                  borderSide: BorderSide(color: Colors.grey, width: 1.0),
                                ),
                              ),
                              validator: (value) {
                                if (value == null || value.isEmpty) {
                                  return 'Please enter your email';
                                }
                                return null;
                              },
                            ),
                            SizedBox(height: 20),
                            ElevatedButton(
                              onPressed: () async {
                                if (_formKey.currentState!.validate()) {
                                  // Retrieve the data
                                  String username = _usernameController.text;
                                  String email = _emailController.text;
                                  String password = _passwordController.text;

                                  try {
                                    bool success = await _apiService.register(username, email, password);
                                    print('success test test: ${success}');
                                    if (success) {
                                      await _storage.write(key: 'register', value: 'true');
                                      ScaffoldMessenger.of(context).showSnackBar(
                                        SnackBar(content: Text('Sign Up Successful')),
                                      );
                                      Navigator.pushReplacement(
                                        context,
                                        MaterialPageRoute(builder: (context) => SignInScreen()),
                                      );
                                    } else {
                                      ScaffoldMessenger.of(context).showSnackBar(
                                        SnackBar(content: Text('Registration Failed')),
                                      );
                                    }
                                  } catch (e) {
                                    ScaffoldMessenger.of(context).showSnackBar(
                                      SnackBar(content: Text('Error: $e')),
                                    );
                                  }
                                }
                              },
                              child: Text(
                                'Sign Up',
                                style: TextStyle(
                                  fontSize: 20,
                                  fontWeight: FontWeight.w700,
                                  color: Colors.white,
                                ),
                              ),
                              style: ElevatedButton.styleFrom(
                                backgroundColor: Color(0xFFFE8400),
                                foregroundColor: Colors.white,
                                padding: EdgeInsets.symmetric(vertical: 10, horizontal: 140),
                                shape: RoundedRectangleBorder(
                                  borderRadius: BorderRadius.circular(20.0),
                                ),
                              ),
                            ),
                            SizedBox(height: 10),
                          ],
                        ),
                      ),
                    ],
                  ),
                ),
              ],
            ),
          ),
        ),
      ),
    );
  }
}
