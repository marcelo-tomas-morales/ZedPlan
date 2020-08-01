<template>
    <form-wizard @onComplete="onComplete">
        <tab-content title="Primer Paso:" :selected="true">
          <div class="form-group">
                <label for="sex">Sexo</label>
                <select
                :class="hasError('sex') ? 'is-invalid' : ''"
                class="form-control"
                v-model="formData.sex"
                >
                <option>Masculino</option>
                <option>Femenino</option>
                <option>Otro</option>
                <option>-</option>
                </select>
                <div v-if="hasError('sex')" class="invalid-feedback">
                <div class="sex" v-if="!$v.formData.sex.required">Por favor, seleccione una opción.</div>
                </div>
            </div>
            <div class="form-group">
                <label for="height">Altura</label>
                <input
                type="text"
                class="form-control"
                :class="hasError('height') ? 'is-invalid' : ''"
                placeholder="Ingrese su altura"
                v-model="formData.height"
                >
                <div v-if="hasError('height')" class="invalid-feedback">
                <div
                    class="error"
                    v-if="!$v.formData.height.required"
                >Por favor ingrese su altura.</div>
                </div>
            </div>
            <div class="form-group">
                <label for="wheight">Peso</label>
                <input
                    type=""
                    class="form-control"
                    :class="hasError('wheight') ? 'is-invalid' : ''"
                    placeholder="Ingrese su peso."
                    v-model="formData.wheight"
                >
                
                <div v-if="hasError('wheight')" class="invalid-feedback">
                <div
                    class="error"
                    v-if="!$v.formData.wheight.required"
                >Por favor ingrese su peso.</div>
                <div class="error" v-if="!$v.formData.wheight.numeric">Tiene que ser un número.</div>
                </div>
                    
            </div>
            <div class="form-group">
                <label for="birthdate">Fecha de nacimiento</label>
                <input
                    type="date"
                    class="form-control"
                    :class="hasError('birthdate') ? 'is-invalid' : ''"
                    placeholder="Ingrese su fecha de nacimiento."
                    v-model="formData.birthdate"
                    name = "birthdate"
                    id = "birthdate"
                    onchange = "calcDate(event);"
                >
                
                <div v-if="hasError('birthdate')" class="invalid-feedback">
                <div
                    class="error"
                    v-if="!$v.formData.birthdate.required"
                >Por favor ingrese su fecha de nacimiento.</div>
                </div>
                    
            </div>
        </tab-content>
        <tab-content title="Segundo Paso">
            <div class="form-group">
                <label for="years">Tu edad</label>
                <input
                type="text"
                class="form-control"
                :class="hasError('companyName') ? 'is-invalid' : ''"
                placeholder="Enter your Company / Organization name"
                id = "years"
                :value = calcDate(formData.birthdate)
                >
              </div>

            <div v-if="calcDate(formData.birthdate) >= 18">
                <div class="form-group">
                  <label for="address">Dirección</label>
                  <input
                    type="text"
                    class="form-control"
                    :class="hasError('address') ? 'is-invalid' : ''"
                    placeholder="Ingrese su dirección"
                    id = "years"
                    v-model="formData.address" v-gmaps-searchbox="formData"
                  >
                  <div v-if="hasError('address')" class="invalid-feedback">
                  <div
                      class="error"
                      v-if="!$v.formData.address.required"
                  >Por favor ingrese su dirreción.</div>
                  </div>
              </div>
            </div>
            
        </tab-content>
    </form-wizard>
</template>

<script>
import { FormWizard, TabContent, ValidationHelper } from "vue-step-wizard";
import "vue-step-wizard/dist/vue-step-wizard.css";
import { required } from "vuelidate/lib/validators";
import { email } from "vuelidate/lib/validators";
import { numeric } from "vuelidate/lib/validators";
import VueGmaps from 'vue-gmaps';

export default {
  name: "StepFormValidation",
  components: {
    FormWizard,
    TabContent,
    VueGmaps
  },
  mixins: [ValidationHelper],
  data() {
    return {
      formData: {
        sex: null,
        height: null,
        wheight: null,
        birthdate: null,
        years: null,
        address: null
      },
      validationRules: [
        { sex: { required }, height: { required, numeric }, wheight: { required, numeric }, birthdate: {required}},
        { years: { required } }
      ]
    };
  },
  methods: {
    onComplete: function (){
      alert("Submitting");
    },
    calcDate(birthdate) {
        var date = new Date(birthdate);
        var today = new Date(new Date().toISOString().slice(0, 10));
        console.log(date);
        console.log(today);
        var diff = Math.floor(today.getFullYear() - date.getFullYear());
        console.log(diff);
        //formData.years = diff;
        return diff;
    }
  }
};
</script>