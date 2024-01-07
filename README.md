# Boarding Pass Sorting API

This API allows you to sort a list of boarding passes based on their source and destination.

## Prerequisites

Before running the API, make sure you have the following installed:

- [Git](https://git-scm.com/)
- [Composer](https://getcomposer.org/)
- PHP (PHP >= 8.2 recommended)

## Getting Started

Follow these steps to get the API up and running:

1. Clone this repository to your local machine:

   ```bash
   git clone https://github.com/RobMKR/boarding-pass-sorting.git

2. Change to the project directory: 
   ```bash
   cd boarding-pass-sorting

3. Install the project dependencies using Composer:
   ```bash
   composer install

4. Start the PHP server by running the following command:
   ```bash
   php -S localhost:8000

# API Endpoints
- GET `/` - Greeting message
- POST `/` - Sort the provided list of boarding passes.

**Sample post Data:**
```json
[
    {
        "id": "15A",
        "type": "bus",
        "source": "Barcelona",
        "destination": "Gerona",
        "gate": null,
        "seat": null
    },
    {
        "id": "78A",
        "type": "train",
        "source": "Madrid",
        "destination": "Barcelona",
        "gate": null,
        "seat": "45B"
    },
    {
        "id": "SK22",
        "type": "plane",
        "source": "Stockholm",
        "destination": "New York",
        "gate": "22",
        "seat": "7B"
    },
    {
        "id": "SK455",
        "type": "plane",
        "source": "Gerona",
        "destination": "Stockholm",
        "gate": "45B",
        "seat": "3A"
    }
]
```

# Usage
1. Make a POST request to http://localhost:8000/ with a JSON array of boarding passes to sort them.

2. The API will respond with the sorted list of boarding passes.

** Sample example response **
```json
{
    "Step 1": "Take Train 78A from Madrid to Barcelona. Seat: 45B",
    "Step 2": "Take Bus 15A from Barcelona to Gerona.",
    "Step 3": "Take Plane SK455 from Gerona to Stockholm. Gate: 45B. Seat: 3A",
    "Step 4": "Take Plane SK22 from Stockholm to New York. Gate: 22. Seat: 7B",
    "Step 5": "You have reached your destination"
}
```

P.S. It might be better to have unit testing for BoardingPassSortingCommand 

P.S.2 Algorithm time complexity is O(n) + O(n) + O(n) for any size of the data.