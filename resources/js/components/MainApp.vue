<template>
    <div class="main">
        <main>
            <div class="form-group">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" v-model="location" id="search-input" placeholder="Enter location">
                    <div class="input-group-append">
                        <span class="input-group-text search-arrow"><i class="fa fa-location-arrow"></i></span>
                    </div>
                    <button type="button" class="btn btn-primary" id="search" v-on:click="getLocation">Search</button>
                </div>
            </div>
            <div class="form-group" v-if="currentWeather.length !== 0">
                    <div class="card shadow-0 border">
                        <div class="card-body p-4">
                            <img v-bind:src="'https://openweathermap.org/img/wn/'+ currentWeather.weather[0].icon +'@2x.png'" width="100" height="100">
                            <p class="mb-0">{{ currentWeather.weather[0].description }}</p>
                            <h4 class="mb-1 sfw-normal">{{ currentWeather.name }}, {{ currentWeather.sys.country }}</h4>
                            <p class="mb-2">Current temperature: <strong>{{ currentWeather.main.temp }}°C</strong></p>
                            <p>Feels like: <strong>{{ currentWeather.main.feels_like }}°C</strong></p>
                            <p>Max: <strong>{{ currentWeather.main.temp_max }}°C</strong>, Min: <strong>{{ currentWeather.main.temp_min }}°C</strong></p>
                            <div class="d-flex flex-row align-items-center">
                                <p class="mb-0">Humidity</p>
                                <img src="/humidity.png" alt="Image" width="50" height="50"/>
                            </div>
                        </div>
                    </div>
            </div>
        </main>
    </div>
</template>
<script>
import axios from "axios";

export default {
    data() {
        return {
            location: '',
            longitude: '',
            latitude: '',
            currentWeather: []
        }
    },
    methods: {
        /*
        * Retrieve location coordinates
        * */
        getLocation() {
            axios.get('/location/?near=' + this.location).
            then(response => {
                let aData = response.data
                this.longitude = aData.data.longitude
                this.latitude = aData.data.latitude
                this.getWeather()
            })
        },
        /*
        * Retrieve weather data
        * */
        getWeather() {
            axios.get('/weather/forecast?latitude=' + this.latitude + '&longitude=' + this.longitude).
            then(response => {
                this.currentWeather = response.data.data.current
            })
        }
    },
    mounted() {

    }
}
</script>
