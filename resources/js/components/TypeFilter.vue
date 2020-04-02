<template>
    <form class="d-inline-block" :action="route">
        <slot></slot>
        <div class="form-group">
            <select class="form-control custom-select" name="status">
                <option :selected="selected === ''" disabled>Тип олимпиады</option>
                    <option v-for="type in types" :selected="type === selected">
                        {{ type }}
                    </option>
            </select>
        </div>
    </form>
</template>

<script>
export default {
    props: {
        route: {
            type: String,
            required: true
        },
        types: {
            type: Array,
            default: []
        },
        selected: {
            type: String,
            default: ''
        }
    }
}
</script>

<style lang="css" scoped>
</style>
