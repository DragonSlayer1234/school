<template>
      <span v-if="place != 0" :class="placeObject" :title="title()"><i class="fas fa-award"></i></span>
      <span v-else title="Нет">Нет</span>
</template>

<script>
export default {
    props: {
        place: {
            default: 0
        }
    },
    computed: {
        placeObject() {
            return {
                gold: this.place == 1,
                silver: this.place == 2,
                bronze: this.place == 3
            }
        }
    },
    methods: {
        title() {
            if (this.place == 1) {
                return 'Первое место'
            } else if (this.place == 2) {
                return 'Второе место'
            } else if (this.place == 3) {
                return 'Третье место'
            }
        }
    }
}
</script>

<style lang="css" scoped>

.silver {
    color: 	#C0C0C0;
}

.gold {
    color: gold;
}

.bronze {
    color: #CD7F32
}
</style>
