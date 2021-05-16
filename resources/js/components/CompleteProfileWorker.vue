<template>
  <div>
    <div class="col-md-4 offset-md-4">
      <!-- Button trigger modal -->
      <button
        type="button"
        style="border-radius: 5px;margin:12px;font-size:15px;background-color:red;border: 2px red solid;color:white;font-size:13px;font-weight:600;width:100px"
        data-toggle="modal"
        data-target="#exampleModal"
      >
        <svg
          style="margin-bottom:3px;"
          height="16"
          viewBox="0 0 16 16"
          version="1.1"
          width="16"
          aria-hidden="true"
        >
          <path
            style="fill:white"
            fill-rule="evenodd"
            d="M11.013 1.427a1.75 1.75 0 012.474 0l1.086 1.086a1.75 1.75 0 010 2.474l-8.61 8.61c-.21.21-.47.364-.756.445l-3.251.93a.75.75 0 01-.927-.928l.929-3.25a1.75 1.75 0 01.445-.758l8.61-8.61zm1.414 1.06a.25.25 0 00-.354 0L10.811 3.75l1.439 1.44 1.263-1.263a.25.25 0 000-.354l-1.086-1.086zM11.189 6.25L9.75 4.81l-6.286 6.287a.25.25 0 00-.064.108l-.558 1.953 1.953-.558a.249.249 0 00.108-.064l6.286-6.286z"
          ></path>
        </svg>
        Complete!
      </button>
    </div>
    <!-- Modal -->
    <div
      class="modal fade"
      id="exampleModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Profile Settings</h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form @submit.prevent="addWorkerInfo">
            <div class="modal-body">
              <div class="form-row">
                <div
                  class="form-group col-md-12"
                  style="width:94%;margin-left:14px"
                >
                  <select
                    id="ville"
                    :class="['form-select', errors.skills ? 'is-invalid' : '']"
                    v-model="skills"
                  >
                    <option value="Skills">Skills</option>

                    <option value="Baby sitting">Baby Sitting</option>
                    <option value="Builder">Building</option>
                    <option value="Beauty and well being"
                      >Beauty and well being</option
                    >
                    <option value="Chouffeur">Chouffeur</option>
                    <option value="Delovery">Delovery</option>
                    <option value="Painting">Painting</option>
                    <option value="Carpenting">Carpenting</option>
                    <option value="Animal care">Animal care</option>
                    <option value="Electronic repair">Electronic repair</option>
                    <option value="Housework and cleaning">Housework and cleaning</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="form-group col-md-12">
                  <textarea
                    id="description"
                    name="description"
                    :class="[
                      'form-control',
                      errors.description ? 'is-invalid' : ''
                    ]"
                    placeholder="description !!"
                    v-model="description"
                  >
                  </textarea>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">
                Close
              </button>
              <input
                type="submit"
                class="btn btn-success"
                value="Save"
                :disabled="button"
              />
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      skills: "Skills",
      description: "",
      errors: [],
      button:false,
    };
  },

  methods: {
    addWorkerInfo() {
      axios
        .post("/addWorkerInfo", {
          skills: this.skills,
          description: this.description
        })
        .then(response => {
          if (response.data.status == "error") {
            this.errors = response.data.errors;
            Toast.fire({
              icon: "error",
              title: "Missing informations"
            });
          } else if (response.data.status == "success") {
            Toast.fire({
              icon: "success",
              title: "Saved in successfully"
            });

            this.errors = [];
            this.skills = "Skills";
            this.description = "";
            this.button=true;
          }
        });
    }
  }
};
</script>
