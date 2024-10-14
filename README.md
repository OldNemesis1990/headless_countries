# Country Selector - Laravel 11

## Description
As an example-based application, data is populated via seeders. The data is then exposed via an API endpoint for other applications to make use of.

## Technologies Used
- **Laravel**: 11
- **PostgreSQL**: 17
- **Breeze**: For authentication (no currently in use)
- **API**: RESTful

## Models
- **Country**: Represents countries in the system.
- **Patient**: Represents patients associated with each country.
- **User**: Represents users of the application.

## Controllers
- **CountryController**: Handles requests related to countries.

## API Endpoints
- **GET /api/countries**: Returns a list of countries along with patient status that can be mapped.