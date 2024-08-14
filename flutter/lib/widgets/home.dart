import 'package:flutter/material.dart';
import 'homeWidgets/home.dart';
import 'homeWidgets/profile.dart';
import 'homeWidgets/search.dart';
import 'package:salomon_bottom_bar/salomon_bottom_bar.dart';

class HomeScreen extends StatefulWidget {
  const HomeScreen({Key? key}) : super(key: key);

  @override
  State<HomeScreen> createState() => _HomeScreenState();
}

class _HomeScreenState extends State<HomeScreen> {
  int _selectedIndex = 1;

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Colors.white, // Set background color to white
      body: _buildBody(),
      bottomNavigationBar: SalomonBottomBar(
        currentIndex: _selectedIndex,
        selectedItemColor: const Color(0xff6200ee),
        unselectedItemColor: const Color(0xff757575),
        onTap: (index) {
          setState(() {
            _selectedIndex = index;
          });
        },
        items: _navBarItems,
      ),
    );
  }

  Widget _buildBody() {
    switch (_selectedIndex) {
      case 0:
       return const searcheScreen();
      case 1:
       return const homeScreen();
      case 2:
      return const ProfilePage1();
      /*case 3:
        return const likeScreen();*/
      default:
        return const Center(child: Text("default Screen"));
    }
  }
}

final _navBarItems = [
  SalomonBottomBarItem(
    icon: const Icon(Icons.search),
    title: const Text("Search"),
    selectedColor: const Color.fromRGBO(61, 143, 239, 1),
  ),
  /*SalomonBottomBarItem(
    icon: const Icon(Icons.favorite_borde),
    title: const Text("Likes"),
    selectedColor: Colors.pink,
  ),*/
  SalomonBottomBarItem(
    icon: const Icon(Icons.home),
    title: const Text("Home"),
    selectedColor: const Color.fromRGBO(61, 143, 239, 1),
  ),
  SalomonBottomBarItem(
    icon: const Icon(Icons.person),
    title: const Text("Profile"),
    selectedColor: const Color.fromRGBO(61, 143, 239, 1),
  ),
];
