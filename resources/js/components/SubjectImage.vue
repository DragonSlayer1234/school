<template>
    <div class="form-group row">
        <div class="col-12 text-center">
            <img class="rounded-circle" :src="path ? path: defaultImage">
        </div>
        <div class="col-12 text-center mt-3">
            <input type="file" name="image" id="image" class="d-none" @change="upload">
            <label for="image" class="btn btn-primary">
                Upload
            </label>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            defaultImage: 'https://via.placeholder.com/150C/',
            path: '',
            image: null
        }
    },
    methods: {
        upload(event) {
            let data = new FormData();
            data.append('image', event.target.files[0]);
            axios.post('/upload/image', data, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }).then((response) => {
                this.path = response.data;
                console.log(response.data)
            });
        }
    }
}
</script>

<style lang="css" scoped>
img {
    width: 150px;
    height: 150px;
}
</style>
