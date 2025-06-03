# PawPalace

PawPalace is a pet adoption platform designed to connect pet owners and adopters. Users can post pets for adoption, browse available pets, and manage their profiles. The platform also includes features like location detection, user authentication, and filtering options for finding pets.

## Features

- **User Authentication**: Signup, login, and logout functionality with secure password hashing
- **Pet Listings**: Users can post pets for adoption or request pets for adoption
- **Profile Management**: Users can update their profiles, including profile pictures and privacy settings
- **Search and Filters**: Advanced filtering options to search for pets by category, species, location, and more
- **Location Detection**: Automatically detect the user's location for pet listings
- **Responsive Design**: Mobile-friendly and responsive UI for seamless user experience
- **Chat Feature**: Users can send messages to pet owners directly from the pet details page

## Project Structure

```
pawpalace/
├── assets/                    # Static assets (images, icons)
├── css/                      # Stylesheet files
├── js/                       # JavaScript files
├── php/                      # PHP scripts
├── index.php                 # Entry point
├── db_connect.php           # Database connection
├── nav.php                  # Navigation component
├── footer.php              # Footer component
└── README.md               # Documentation
```

## Installation

1. Clone the repository:

```bash
git clone https://github.com/Tertho1/PawPalace.git
```

2. Configure your web server (XAMPP/WAMP) to point to the project directory

3. Import the database schema from `database/pawpalace.sql`

4. Update database credentials in `db_connect.php`

5. Access the site through your web browser at `http://localhost/pawpalace`

## Usage

1.Signup/Login: Create an account or log in to access the platform.
2.Post Adoption: Use the "Post Adoption" button to list a pet for adoption.
3.Browse Listings: Explore available pets or adoption requests.
4.Profile Management: Update your profile details and privacy settings.
5.Search and Filter: Use the filter options to narrow down your search.

## Technologies Used

- PHP 7.4+
- MySQL 5.7+
- HTML5/CSS3
- JavaScript
- XAMPP/WAMP Server

## Contributing

Pull requests are welcome. For major changes, please open an issue first to discuss proposed changes.

## License

This project is licensed under the MIT License. See the LICENSE file for details.

## Acknowledgments

OpenStreetMap for location services.
Font Awesome for icons.
The open-source community for inspiration and resources.
