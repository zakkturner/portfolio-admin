<script setup>

import BaseTextArea from "@/Components/form/BaseTextArea.vue";
import BaseSelect from "@/Components/form/BaseSelect.vue";
import BaseInput from "@/Components/form/BaseInput.vue";
import {router, useForm} from "@inertiajs/vue3";
const props = defineProps({
  category: Object,
});
const formData = useForm({
  name: props.category.name || "",

});
const submit = () =>{
  router.patch(route('categories.update', props.category.id), formData );
}
</script>

<template>
  <form @submit.prevent="submit" enctype="multipart/form-data">
    <BaseInput label="Name" v-model="formData.name">
      <p class="text-red-500" v-if="formData.errors.name">
        {{ formData.errors.name }}
      </p>
    </BaseInput>

    <div class="flex flex-col mb-4">
      <input type="submit" value="Submit" />
    </div>
  </form>
</template>

<style scoped lang="scss">

</style>