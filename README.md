
![Image description](https://github.com/jccun23/weather-app/blob/master/resources/images/screenshot.jpeg)
## About Weather App
A weather app that allows you to check the current weather of your chosen location and also the 5 day forecasts.
## Reason UI/UX and code implementation is the best
Below are the reasons why my UI/UX implementation and code implementation is the best


- The UX that I implemented is easy to use for tourist. In a way that they will be able to know the current weather of their chosen location and the forecast for the next 5 days.
- The codes for both frontend and backend are readable and easy to maintain.
- I have separated the backend logic files for both location and weather wherein it will be more maintainable if there are new functionalities that will be added.  
- The error alert utilizes the use of sweetalert instead of the default alert of javascript. Wherein the sweetalert has a better design than the default alert.
- The app is responsive.
- The app gives the tourists the informations that they need like the temperature, type of weather, maximum temperature, minimum temperature, humidity for the current weather and wind speed of the current weather.

## Setup
The app uses the laravel + vue js + docker set up.

Prerequisite
1. Docker Desktop should be installed
   - https://www.docker.com/products/docker-desktop/
2. Openweather Account (For the api key).
   - https://openweathermap.org
3. Foursquare developers account (For the api key).
   - https://foursquare.com/developers/home
---
1. Clone the repository
2. Copy the contents of the .env.example for your .env

```text
Run the command below inside your project folder to copy the contents of the .env.example 
cp .env.example .env
```
3. Add the following env keys for the openweather api and foursquare api
```dotenv
FOURSQUARE_API_KEY={your-foursquare-api-key}
FOURSQUEARE_API_URL=https://api.foursquare.com/v3/places/search

OPENWEATHER_API_KEY={your-openweather-api-key}
OPENWEATHER_FORECAST_API_URL=https://api.openweathermap.org/data/2.5/forecast
OPENWEATHER_CURRENT_API_URL=https://api.openweathermap.org/data/2.5/weather
```
4. Run the following commands to your terminal
```text
npm install
composer install
```
5. Run `npm run dev`
6. Run `./vendor/bin/sail up` to run the application.
7. Visit `http://localhost` to test the app


