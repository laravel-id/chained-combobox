<template>
	<form @submit.prevent="submit" method="post" action="/location">

		<div v-if="alert.message" :class="['alert alert-' + alert.type]">
			<p>{{ alert.message }}</p>
		</div>

		<div :class="['form-group', { 'has-error' : errors.province }]">
			<label class="control-label">Provinsi</label>
			<select @change="province" v-model="state.province" class="form-control">
				<option value="">Pilih Provinsi</option>
				<option v-for="province in provinces" :value="province.id">
					{{ province.name }}
				</option>
			</select>
			<span v-if="errors.province" class="label label-danger">
				{{ errors.province[0] }}
			</span>
		</div>

		<div :class="['form-group', { 'has-error' : errors.regency }]">
			<label class="control-label">Kota/kabupaten</label>
			<select @change="regency" v-model="state.regency" class="form-control">
				<option value="">Pilih Kota/Kabupaten</option>
				<option v-for="regency in regencies" :value="regency.id">
					{{ regency.name }}
				</option>
			</select>
			<span v-if="errors.regency" class="label label-danger">
				{{ errors.regency[0] }}
			</span>
		</div>

		<div :class="['form-group', { 'has-error' : errors.district }]">
			<label class="control-label">Kecamatan</label>
			<select v-model="state.district" class="form-control">
				<option value="">Pilih Kecamatan</option>
				<option v-for="district in districts" :value="district.id">
					{{ district.name }}
				</option>
			</select>
			<span v-if="errors.district" class="label label-danger">
				{{ errors.district[0] }}
			</span>
		</div>

		<div class="form-group">
			<button class="btn btn-primary">Kirim</button>
		</div>
	</form>
</template>

<script>
	export default {
		name: 'LocationForm',

		data() {
			return {
				alert: {},
				errors: [],
				state: {
					province: '',
					regency: '',
					district: ''
				},
				provinces: [],
				regencies: [],
				districts: []
			}
		},

		mounted() {
			// get all provinces data
			axios.get('/location/province').then(response => {
				this.provinces = response.data;
			}).catch(error => console.error(error));
		},

		methods: {
			submit(e) {
				this.errors = [];
				this.alert = {};

				axios.post(e.target.action, this.state).then(response => {
					if (response.data.status) {
						this.alert = {
							type: 'success',
							message: response.data.message
						}

						this.errors = [];
					}
				}).catch(error => {
					if (error) {
						if (error.response.status == 422) {
							this.errors = error.response.data;
						}
					}
				});
			},

			province() {
				this.state.regency = '';

				// set params
				const params = {
					province: this.state.province
				}

				// url /location/regency?province=xxx
				axios.get('/location/regency', {params}).then(response => {
					this.regencies = response.data;
				}).catch(error => console.error(error));
			},

			regency() {
				this.state.district = '';

				// set params
				const params = {
					regency: this.state.regency
				};

				axios.get('/location/district', {params}).then(response => {
					this.districts = response.data;
				}).catch(error => console.error(error));
			}
		}
	}
</script>