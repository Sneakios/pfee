<template>
    <div class="container" >
        <div class="row justify-content-center" >
            <div class="col-md-12">
                <div class="card" >
                    <div class="card-header">Setting</div>

                    <div class="card-body">
                       <form method="POST" >
                                            <h2 class="text-center cna">Profile Settings</h2>
                                           
                
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <input id="firstname" type="text" class="form-control" name="firstname"  required autocomplete="firstname" autofocus placeholder="firstname">
                                                </div>
                
                                                <div class="form-group col-md-6">
                                                    <input id="lastname" type="text" class="form-control" name="lastname"  required autocomplete="lastname" autofocus placeholder="lastname">
                
                                                </div>
                                            </div>
                
                
                                            <div class="form-row">
                                             <div class="form-group col-md-6">
                                                <input type="text" class="form-control" id="adresse" placeholder="adresse" name="adresse" required>
                                            </div>
                


                                                <div class="form-group col-md-6">
                                                    <input id="mobile" type="tel" class="form-control" name="mobile"  required autocomplete="mobile" autofocus placeholder="mobile">
                
                                                </div>
                                            </div>
                
                
                                         
                
                
                
                
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <select id="ville" class="form-control birth" name="ville">
                                                        <option>Ville ..</option>
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
                                                <div class="form-group col-md-4">
                                                    <select id="genre" class="form-control birth" name="genre">
                                                        <option>Genre ..</option>
                                                        <option value="homme">Homme</option>
                                                        <option value="femme">Femme</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                
                                                    <select id="type" class="form-control birth" name="type">
                                                        <option>Type ..</option>
                                                        <option value="client">Client</option>
                                                        <option value="employeur">Employeur</option>
                                                    </select>
                                                </div>
                                            </div>
                
                
                
                                            <div class="form-row">
                                             
                                               
                                               
                                            </div>
                
                                            <div class="form-group row mb-0">
                                                <div class="col-md-6 offset-md-5">
                                                    <button type="submit" class="btn btn-primary">
                                                        Save Profile
                                                    </button>
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
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style>

</style>