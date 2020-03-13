<template>
    <form>
        <div class="form-group row justify-content-center">
            <label for="name" class="col-2 col-form-label text-right">Name</label>
            <div class="col-8">
                <b-form-input v-model="olympiad.name" :state="errors.name ? false: null" placeholder="Enter a Name" ></b-form-input>
                <b-form-invalid-feedback v-for="(item, key) in errors.name" :key="key">
                    {{ item }}
                </b-form-invalid-feedback>
            </div>
        </div>

        <div class="form-group row justify-content-center">
            <label for="subject_id" class="col-2 col-form-label text-right">Subject</label>
            <div class="col-8">
                <b-form-select v-model="olympiad.subject" :state="errors.subject ? false: null">
                    <b-form-select-option :value="null">Please select a subject</b-form-select-option>
                    <b-form-select-option v-for="item in subjects" :value="item.id" :key="item.id">
                        {{ item.name }}
                    </b-form-select-option>
                </b-form-select>
                <b-form-invalid-feedback v-for="(item, key) in errors.subject" :key="key">
                    {{ item }}
                </b-form-invalid-feedback>
            </div>
        </div>

        <div class="form-group row justify-content-center">
            <div class="col-4 offset-2">
                <b-form-datepicker v-model="olympiad.startDate" :state="errors.startDate ? false: null" placeholder="Start Date"></b-form-datepicker>
                <b-form-invalid-feedback v-for="(item, key) in errors.startDate" :key="key">
                    {{ item }}
                </b-form-invalid-feedback>
            </div>
            <div class="col-4">
                <b-form-timepicker v-model="startTime" placeholder="Start Time"></b-form-timepicker>
            </div>
        </div>

        <div class="form-group row justify-content-center">
            <div class="col-4 offset-2">
                <b-form-datepicker v-model="olympiad.endDate" :state="errors.endDate ? false: null" placeholder="End Date"></b-form-datepicker>
                <b-form-invalid-feedback v-for="(item, key) in errors.endDate" :key="key">
                    {{ item }}
                </b-form-invalid-feedback>
            </div>
            <div class="col-4">
                <b-form-timepicker v-model="endTime" placeholder="End Time"></b-form-timepicker>
            </div>
        </div>

        <div class="form-group row justify-content-center">
            <label for="cost" class="col-2 col-form-label text-right">Cost</label>
            <div class="col-8">
                <b-form-input v-model="olympiad.cost" :state="errors.cost ? false: null" placeholder="Enter Cost"></b-form-input>
                <b-form-invalid-feedback v-for="(item, key) in errors.cost" :key="key">
                    {{ item }}
                </b-form-invalid-feedback>
            </div>
        </div>

        <div class="form-group row justify-content-center">
            <label for="work" class="col-2 col-form-label text-right">Work</label>
            <div class="col-8">
                <b-form-file
                v-model="olympiad.work"
                placeholder="Choose a file or drop it here..."
                :state="errors.work ? false: null"

                ></b-form-file>
                <div class="mt-3">Selected file: {{ olympiad.work ? olympiad.work.name : '' }}</div>
                <b-form-invalid-feedback v-for="(item, key) in errors.work" :key="key">
                    {{ item }}
                </b-form-invalid-feedback>
            </div>
        </div>

        <div class="form-group row justify-content-center">
            <div class="col-10 text-center">
                <button type="button" class="btn btn-primary" @click.prevent="create">Create</button>
            </div>
        </div>
    </form>
</template>

<script>

export default {
    props: {
        subjects: {
            type: Array,
            required: true
        }
    },
    data() {
        return {
            olympiad: {
                name: '',
                subject: null,
                startDate: '',
                endDate: '',
                cost: '',
                work: null
            },
            startTime: '',
            endTime: '',
            errors: []
        }
    },
    methods: {
        create() {
            let data = new FormData();

            this.olympiad.startDate += ' ' + this.startTime;
            this.olympiad.endDate += ' ' + this.endTime;

            for (var key in this.olympiad) {
                data.append(key, this.olympiad[key]);
            }

            axios.post('/teacher/my-olympiad', data, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }).then((response) => {
                console.log(response.data);
                window.location.href = '/teacher/my-olympiads/draft';
            }).catch((errors) => {
                console.log(errors.response);
                this.errors = errors.response.data.errors;
            });
        }
    }
}
</script>

<style lang="css" scoped>
</style>
