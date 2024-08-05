import 'package:flutter/material.dart';

class NewsFeedPage2 extends StatelessWidget {
  const NewsFeedPage2({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: CustomScrollView(
        slivers: [
          // Fixed header section
          SliverAppBar(
            pinned: true,
            expandedHeight: 120.0, // Adjust height as needed
            backgroundColor: Color.fromARGB(255, 255, 255, 255),
            flexibleSpace: FlexibleSpaceBar(
              background: Column(
                children: [
                  Container(
                    padding: const EdgeInsets.only(top: 60.0, left: 8, right: 8),
                    child: Row(
                      mainAxisAlignment: MainAxisAlignment.spaceBetween,
                      children: [
                        // Logo image
                        Image.asset(
                          'image/kids.png', // Path to your logo image
                          width: 50.0, // Adjust size as needed
                          height: 50.0,
                        ),
                        // Search bar
                        Expanded(
                          child: Padding(
                            padding: const EdgeInsets.symmetric(horizontal: 16.0),
                            child: TextField(
                              decoration: InputDecoration(
                                hintText: 'Search...',
                                hintStyle: TextStyle(color: Colors.black54),
                                border: OutlineInputBorder(
                                  borderRadius: BorderRadius.circular(30),
                                  borderSide: BorderSide.none,
                                ),
                                filled: true,
                                fillColor: Colors.grey[200],
                                prefixIcon: Icon(Icons.search, color: const Color.fromARGB(255, 70, 98, 255)),
                              ),
                            ),
                          ),
                        ),
                        // Notification icon
                        IconButton(
                          icon: Icon(Icons.notifications, size: 30,color: const Color.fromARGB(255, 70, 98, 255),),
                          onPressed: () {
                            // Handle notification icon tap
                          },
                        ),
                      ],
                    ),
                  ),
                ],
              ),
            ),
          ),
          // Scrollable content
          SliverToBoxAdapter(
            child: Column(
              children: [
                // Event announcement
Padding(
  padding: const EdgeInsets.all(8.0),
  child: SizedBox(
    height: 180,
    width:380, // Adjust the height as needed
    child: Container(
      padding: const EdgeInsets.all(16.0),
      decoration: BoxDecoration(
        color: Color.fromRGBO(172, 215, 255, 1), // Background color (can be omitted if using image as background)
        borderRadius: BorderRadius.circular(12), // Rounded border
        boxShadow: [
          BoxShadow(
            color: Colors.black26,
            blurRadius: 4,
            offset: Offset(0, 2),
          ),
        ],
        image: DecorationImage(
          image: AssetImage('image/BG.png'), // Background image
          fit: BoxFit.cover, // Adjust the fit as needed
        ),
      ),
      child: Column(
        crossAxisAlignment: CrossAxisAlignment.start,
        children: [
          SizedBox(height: 16), // Add space between image and text
          /*Align(
            alignment: Alignment.centerRight,
            child: TextButton(
              onPressed: () {
                // Handle Learn More button tap
                // You can navigate to a detailed event page or show a dialog
              },
              style: TextButton.styleFrom(
                backgroundColor: Color.fromRGBO(172, 215, 255, 1), // Button background color
              ),
              child: Text(
                'Learn More',
                style: TextStyle(
                  color: Color.fromARGB(255, 255, 255, 255), // Text color
                  fontWeight: FontWeight.w700,
                  fontSize: 20,
                ),
              ),
            ),
          ),*/
        ],
      ),
    ),
  ),
),

                // Category title
                const Padding(
                  padding: EdgeInsets.symmetric(horizontal: 20.0, vertical: 8.0),
                  child: Align(
                    alignment: Alignment.centerLeft,
                    child: Text(
                      'Category',
                      style: TextStyle(fontSize: 25, fontWeight: FontWeight.w700),
                    ),
                  ),
                ),
                // Horizontal list view
                Padding(
  padding: const EdgeInsets.symmetric(horizontal: 8.0),
  child: SizedBox(
    height: 50, // Adjust height as needed
    child: ListView.builder(
      scrollDirection: Axis.horizontal,
      itemCount: 6,
      itemBuilder: (BuildContext context, int index) => Card(
        color: Color.fromRGBO(61, 143, 239, 1), // Background color of the Card
        child: Center(
          child: Padding(
            padding: EdgeInsets.all(8.0),
            child: Text(
              'Category',
              style: TextStyle(color: Colors.white,fontWeight: FontWeight.w700 ,fontSize: 15), // Text color for better visibility on the background color
            ),
          ),
        ),
      ),
    ),
  ),
),

              ],
            ),
          ),
          // Posts title and list
          SliverToBoxAdapter(
            child: Container(
              height: 570, // Limit the height as needed
              child: Column(
                crossAxisAlignment: CrossAxisAlignment.start,
                children: [
                  // Posts title
                  const Padding(
                    padding: EdgeInsets.symmetric(horizontal: 20.0, vertical: 8.0),
                    child: Align(
                      alignment: Alignment.centerLeft,
                      child: Text(
                        'Challenges',
                        style: TextStyle(fontSize: 25, fontWeight: FontWeight.w700),
                      ),
                    ),
                  ),
                  // List of articles
                  Expanded(
                    child: ListView.builder(
                      itemCount: _articles.length,
                      itemBuilder: (BuildContext context, int index) {
                        final item = _articles[index];
                        return Column(
                          children: [
                            Container(
  margin: const EdgeInsets.symmetric(horizontal: 16, vertical: 8.0),
  decoration: BoxDecoration(
    color: Color.fromRGBO(234, 244, 255, 1), // Background color for the content container
    border: Border.all(color: const Color(0xFFE0E0E0)),
    borderRadius: BorderRadius.circular(8.0),
  ),
  child: Column(
  crossAxisAlignment: CrossAxisAlignment.start,
  children: [
    Container(
      width: double.infinity,
      height: 225,
      decoration: BoxDecoration(
        borderRadius: BorderRadius.vertical(top: Radius.circular(8.0)),
        image: DecorationImage(
          fit: BoxFit.cover,
          image: NetworkImage(item.imageUrl),
        ),
      ),
    ),
    Padding(
      padding: const EdgeInsets.all(8.0),
      child: Column(
        crossAxisAlignment: CrossAxisAlignment.start,
        children: [
          Text(
            item.title,
            style: const TextStyle(fontWeight: FontWeight.bold ,fontSize: 18),
            maxLines: 2,
            overflow: TextOverflow.ellipsis,
          ),
          const SizedBox(height: 8),
          Text("${item.author} · ${item.postedOn}"),
          const SizedBox(height: 8),
          Row(
            mainAxisAlignment: MainAxisAlignment.spaceBetween,
            children: [
              Row(
                mainAxisSize: MainAxisSize.min,
                children: [
                  // Existing icons
                  Icons.favorite_border,
                  Icons.share,
                  Icons.more_vert
                ].map((icon) {
                  return InkWell(
                    onTap: () {},
                    child: Padding(
                      padding: const EdgeInsets.only(right: 8.0),
                      child: Icon(
                        icon,
                        size: 30,
                        color: Color.fromRGBO(61, 143, 239, 1),
                      ),
                    ),
                  );
                }).toList(),
              ),
              SizedBox(
                height: 40, // Adjust height as needed
                child: TextButton(
                  onPressed: () {
                    // Handle Learn More button tap
                  },
                  style: TextButton.styleFrom(
                    backgroundColor: Color.fromRGBO(61, 143, 239, 1), // Text color
                    shape: RoundedRectangleBorder(
                      borderRadius: BorderRadius.circular(8), // Rounded corners
                    ),
                  ),
                  child: Row(
                      mainAxisSize: MainAxisSize.min,
                      children: [
                        SizedBox(width: 8), // Space between icon and text
                        Text(
                          'Learn More ',
                          style: TextStyle(fontSize: 16, color: Colors.white), // Adjust text size if needed
                        ),
                        Icon(
                          Icons.arrow_forward, // Replace with your desired icon
                          color: Colors.white,
                          size: 20, // Adjust icon size as needed
                        ),
                      ],
                    ),
                ),
              ),
            ],
          ),
        ],
      ),
    ),
  ],
),)

                          ],
                        );
                      },
                    ),
                  ),
                ],
              ),
            ),
          ),
        ],
      ),
    );
  }
}

class UncontainedLayoutCard extends StatelessWidget {
  const UncontainedLayoutCard({
    super.key,
    required this.index,
    required this.label,
  });

  final int index;
  final String label;

  @override
  Widget build(BuildContext context) {
    return ColoredBox(
      color: Colors.primaries[index % Colors.primaries.length].withOpacity(0.5),
      child: Center(
        child: Text(
          label,
          style: const TextStyle(color: Colors.white, fontSize: 20),
          overflow: TextOverflow.clip,
          softWrap: false,
        ),
      ),
    );
  }
}

class Article {
  final String title;
  final String imageUrl;
  final String author;
  final String postedOn;

  Article({
    required this.title,
    required this.imageUrl,
    required this.author,
    required this.postedOn,
  });
}

final List<Article> _articles = [
  Article(
    title: "Instagram quietly limits ‘daily time limit’ option",
    author: "MacRumors",
    imageUrl: "https://picsum.photos/id/1000/960/540",
    postedOn: "Yesterday",
  ),
  Article(
    title: "Google Search dark theme goes fully black for some on the web",
    imageUrl: "https://picsum.photos/id/1010/960/540",
    author: "9to5Google",
    postedOn: "4 hours ago",
  ),
  Article(
    title: "Check your iPhone now: warning signs someone is spying on you",
    author: "New York Times",
    imageUrl: "https://picsum.photos/id/1001/960/540",
    postedOn: "2 days ago",
  ),
  Article(
    title: "Amazon’s incredibly popular Lost Ark MMO is ‘at capacity’ in central Europe",
    author: "MacRumors",
    imageUrl: "https://picsum.photos/id/1002/960/540",
    postedOn: "22 hours ago",
  ),
  Article(
    title: "Panasonic's 25-megapixel GH6 is the highest resolution Micro Four Thirds camera yet",
    author: "Polygon",
    imageUrl: "https://picsum.photos/id/1020/960/540",
    postedOn: "2 hours ago",
  ),
  Article(
    title: "Samsung Galaxy S22 Ultra charges strangely slowly",
    author: "TechRadar",
    imageUrl: "https://picsum.photos/id/1021/960/540",
    postedOn: "10 days ago",
  ),
  Article(
    title: "Snapchat unveils real-time location sharing",
    author: "Fox Business",
    imageUrl: "https://picsum.photos/id/1060/960/540",
    postedOn: "10 hours ago",
  ),
];
