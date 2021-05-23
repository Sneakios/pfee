<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">Setting</div>

          <div class="card-body">
            <form @submit.prevent="changeWorkerSettings">
              <h2 class="text-center cna">Profile Settings</h2>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <input
                    id="firstname"
                    type="text"
                    :class="[
                      'form-control',
                      errors.firstname ? 'is-invalid' : ''
                    ]"
                    required
                    autocomplete="firstname"
                    autofocus
                    v-model="firstname"
                  />
                </div>

                <div class="form-group col-md-6">
                  <input
                    id="lastname"
                    type="text"
                    :class="[
                      'form-control',
                      errors.lastname ? 'is-invalid' : ''
                    ]"
                    required
                    autocomplete="lastname"
                    autofocus
                    v-model="lastname"
                  />
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <input
                    type="text"
                    :class="[
                      'form-control',
                      errors.adresse ? 'is-invalid' : ''
                    ]"
                    id="adresse"
                    required
                    v-model="adresse"
                  />
                </div>
                <div class="form-group col-md-6">
                  <input
                    id="mobile"
                    type="tel"
                    :class="['form-control', errors.mobile ? 'is-invalid' : '']"
                    required
                    autocomplete="mobile"
                    autofocus
                    v-model="mobile"
                  />
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <select
                    id="specialty"
                    class="form-select birth"
                    v-model="ville"
                  >
                    <option value="Ariana">Ariana</option>
                    <option value="Beja">Beja</option>
                    <option value="Ben Arous">Ben Arous</option>
                    <option value="Bizerte">Bizerte</option>
                    <option value="Gabes">Gabes</option>
                    <option value="Gafsa">Gafsa</option>
                    <option value="Jendouba">Jandouba</option>
                    <option value="Kairouan">Kairouan</option>
                    <option value="Kasserine">Kasserine</option>
                    <option value="Kebili">Kebili</option>
                    <option value="Le Kef">Le Kef</option>
                    <option value="Mahdia">Mahdia</option>
                    <option value="La Lanouba">La Manouba</option>
                    <option value="Mednine">Mednine</option>
                    <option value="Monastir">Monastir</option>
                    <option value="Sfax">Sfax</option>
                    <option value="Sidi Bouzid">Sidi Bouzid</option>
                    <option value="Seliana">Seliana</option>
                    <option value="Sousse">Sousse</option>
                    <option value="Tataouine">Tataouine</option>
                    <option value="Tozeur">Tozeur</option>
                    <option value="Tunis">Tunis</option>
                    <option value="Zaghouan">Zaghouan</option>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <select id="ville" class="form-select birth" v-model="skills">
                    <option value="Baby sitting"> <i class="fas fa-baby"></i>Baby Sitting</option>
                    <option value="Builder">Building</option>
                    <option value="Beauty and well being">Beauty and well being</option>
                    <option value="Chouffeur">Chouffeur</option>
                    <option value="Delovery">Delovery</option>
                    <option value="Painting">Painting</option>
                    <option value="Carpenting">Carpenting</option>
                    <option value="Animal care">Animal care</option>
                    <option value="Electronic repair">Electronic repair</option>
                    <option value="Kebili">Housework and cleaning</option>
                  </select>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-12">
                  <textarea
                    id="description"
                    :class="[
                      'form-control',
                      errors.description ? 'is-invalid' : ''
                    ]"
                    v-model="description"
                  >
                  </textarea>
                </div>
              </div>

              <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-5">
                  <input
                    type="submit"
                    class="btn btn-primary"
                    value="Save Changes"
                  />
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      name: [],
      adresse: "",
      mobile: "",
      ville: "",
      skills: "",
      description: "",
      lastname: "",
      firstname: "",
      errors: []
    };
  },
  methods: {
    ShowSettings() {
      axios.get("/showWorkerSettings").then(response => {
        this.name = response.data.worker.name.split(" ");
        this.adresse = response.data.worker.adresse;
        this.mobile = response.data.worker.mobile;
        this.ville = response.data.worker.ville;
        this.skills = response.data.workerInfo[0].specialty;
        this.description = response.data.workerInfo[0].description;
        this.firstname = this.name[0];
        this.lastname = this.name[1];
      });
    },
    changeWorkerSettings() {
      axios
        .put("/changeWorkerSettings", {
          lastname: this.lastname,
          firstname: this.firstname,
          adresse: this.adresse,
          mobile: this.mobile,
          ville: this.ville,
          skills: this.skills,
          description: this.description
        })
        .then(response => {
          if (response.data.status == "error") {
            this.errors = response.data.errors;
            Toast.fire({
              icon: "error",
              title: "False informations !!"
            });
          } else if (response.data.status == "success") {
            Toast.fire({
              icon: "success",
              title: "Saved in successfully"
            });
            this.errors = [];
          }
        });
    }
  },
  created() {
    this.ShowSettings();
  }
};
</script>

<style>
</style>