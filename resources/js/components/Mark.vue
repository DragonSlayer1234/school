<template>
    <div class="table-div">
        Оценка:
        <input type="text" name="mark" size="5" v-model="participant.mark">
        <button class="btn" @click="mark"><i class="fas fa-check"></i></button>
        <hr>

        Место:
        <select class="place custom-select py-0" name="place" v-model="participant.place">
            <option value="null">Нет</option>
            <option value="1">Первое</option>
            <option value="2">Второе</option>
            <option value="3">Третье</option>
        </select>
        <button type="submit" class="btn" @click="setPlace"><i class="fas fa-check"></i></button>
    </div>
</template>

<script>
export default {
    props: {
        participant: {
            type: Object,
            required: true
        },
    },
    methods: {
        mark() {
            axios.post(`/teacher/participant/${this.participant.id}/mark`, { mark: this.participant.mark });
        },
        setPlace() {
            axios.post(`/teacher/participant/${this.participant.id}/set-place`, { place: this.participant.place })
            .catch((error) => {
                console.log(error.response)
            });
        }

    }
}
</script>

<style lang="css" scoped>
</style>
