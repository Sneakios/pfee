<template>
 <div class="container-fluid p-0">

                            <h1 class="h3 mb-3">User Management</h1>

                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">

                    <div class="form-row">
                        <div class="form-group col-md-3" >
                        <input type="text" v-model="filter" class="form-control" placeholder="Search .."/>
                        </div>

                        <div class="form-group col-md-6">
                        
                        </div>

                        <div class="form-group col-md-3">
                        
                        <select v-model="perPage" class="form-select" style="width:100px;margin-left:100px">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="20">15</option>
                        <option value="50">20</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                         <option value="100">100</option>
                        </select>
                        </div>

                        
                    </div>								</div>
								<div class="card-body">
                                 <bootstrap-4-datatable :columns="columns" :data="rows" :filter="filter" :per-page="perPage">
          
                                 </bootstrap-4-datatable>
                                 <bootstrap-4-datatable-pager v-model="page" type="abbreviated"></bootstrap-4-datatable-pager>
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
                columns: [
                    {
                        label: 'id',
                        field: 'id'
                    },
                    {
                        label: 'name',
                        field: 'name'
                    },
                    {
                        label: 'email',
                        field: 'email'
                    },
                  
                    {
                        label: 'ville',
                        field: 'ville'
                    },
                    {
                        label: 'type',
                        field: 'type'
                    },
                    {
                        label: 'mobile',
                        field: 'mobile'
                    },
                     {
                        label: 'date',
                        field: 'added_at'
                    },
                     {
                        label: 'action',
                        
                    },
                    
                ],
                       rows: [],
                page: 1,
                filter:  '',
                perPage: 10,
            }
        },

            methods: {
            showBlogs(){
              axios.get("/AllUsers").then(response => {
                            this.rows = response.data.data;
                        });
                        },
        },
        created(){
            this.showBlogs()
        }
    }
</script>
