<template>
    <div class="main">
        <main>
            <div class="form-group">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" v-model="location" id="search-input" placeholder="Enter location">
                    <div class="input-group-append">
                        <span class="input-group-text search-arrow"><i class="fa-solid fa-location-dot"></i></span>
                    </div>
                    <button type="button" class="btn btn-primary" id="search" v-on:click="getLocation">Search</button>
                </div>
            </div>
            <div class="form-group" v-if="currentWeather.length !== 0">
                    <div class="card shadow-0 border">
                        <div class="card-body p-4 current-weather">
                            <img v-bind:src="'https://openweathermap.org/img/wn/'+ currentWeather.weather[0].icon +'@2x.png'" width="100" height="100">
                            <p class="mb-0" style="font-weight: bold">{{ currentWeather.weather[0].description }}</p>
                            <h4 class="mb-1 sfw-normal">{{ currentWeather.name }}, {{ currentWeather.sys.country }}</h4>
                            <p class="mb-2">Current temperature: <strong>{{ currentWeather.main.temp }}°C</strong></p>
                            <p>Feels like: <strong>{{ currentWeather.main.feels_like }}°C</strong></p>
                            <p>Max: <strong>{{ currentWeather.main.temp_max }}°C</strong>, Min: <strong>{{ currentWeather.main.temp_min }}°C</strong></p>
                            <p><span><i class="fa-solid fa-water"></i></span>Humidity: <strong>{{ currentWeather.main.humidity }}% </strong> - <span><i class="fa-solid fa-wind"></i></span>Wind: <strong>{{ currentWeather.wind.speed }}m/s</strong></p>
                        </div>
                    </div>
            </div>
            <div class="form-group mt-2" v-if="fiveDayForecast.length !== 0">
                <div class="row">
                    <div class="col-lg mb-2" v-for="(forecast, index) in fiveDayForecast">
                        <div class="card shadow-0 border">
                            <div class="card-body p-4">
                                <p class="mb-2" style="color: white">{{ formatDate(index).toDateString() }}</p>
                                <div class="scroll-body">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item" v-for="date in forecast"><div>
                                            <p class="mb-0">{{ formatToTime(date.dt_txt)}}</p>
                                            <img v-bind:src="'https://openweathermap.org/img/wn/'+ date.weather[0].icon +'@2x.png'" width="50" height="50">
                                            <p class="mb-0" style="font-weight: bold">{{ date.weather[0].description }}</p>
                                            <p class="mb-2">Temperature: <strong>{{ date.main.temp }}°C</strong></p>
                                            <p>Feels like: <strong>{{ date.main.feels_like }}°C</strong></p>
                                            <p>Max: <strong>{{ date.main.temp_max }}°C</strong>, Min: <strong>{{ date.main.temp_min }}°C</strong></p>
                                        </div></li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</template>
<script>
import axios from "axios";
import Swal from 'sweetalert2'
export default {
    data() {
        return {
            location: '',
            longitude: '',
            latitude: '',
            currentWeather: [],
            fiveDayForecast: []
        }
    },
    methods: {
        /*
        * Retrieve location coordinates
        * */
        getLocation() {
            if (this.location === '') {
                Swal.fire({
                    title: 'Error!',
                    text: 'Please enter a location',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                });
                return;
            }

            axios.get('/location/?near=' + this.location).
            then(response => {
                let aData = response.data;
                this.longitude = aData.data.longitude;
                this.latitude = aData.data.latitude;
                this.getWeather();
            }).catch(function(error) {
                Swal.fire({
                    title: 'Error!',
                    text: 'Error occurred. Please try again!',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                });
            })
        },
        /*
        * Retrieve weather data
        * */
        getWeather() {
            axios.get('/weather/forecast?latitude=' + this.latitude + '&longitude=' + this.longitude).
            then(response => {
                this.currentWeather = response.data.data.current;
                let aFiveDayForecast = response.data.data.forecast;
                this.fiveDayForecast = this.groupItems(aFiveDayForecast, 'dt_txt');
            }).catch(function (error) {
                Swal.fire({
                    title: 'Error!',
                    text: 'Error occurred. Please try again!',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                });
            })
        },
        /*
        * Group forecast by date
        * */
        groupItems(array, property) {
            return array.reduce(function(groups, item) {
                let name = item[property]
                let date = new Date(name);
                name = date.toLocaleDateString();
                let group = groups[name] || (groups[name] = []);
                group.push(item);
                return groups;
            }, { });
        },
        /*
        * Format date
        * */
        formatDate(date) {
            return new Date(date);
        },
        /*
        *
        * Format time
        * */
        formatToTime(date) {
            let newDate = new Date(date).toLocaleTimeString();
            return newDate.replace(':00:00', '');
        }
    }
}
</script>
