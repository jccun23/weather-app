<template>
    <div class="main">
        <main>
            <div class="form-group">
                <input type="text" class="w-50" placeholder="Enter Location" v-model="query">
            </div>
        </main>
    </div>
</template>
<script>
export default {
    data() {
        return {
            featured: [
                'Tokyo',
                'Yokohama',
                'Kyoto',
                'Osaka',
                'Sapporo',
                'Nagoya'
            ],
            query: ''
        }
    }
}
</script>