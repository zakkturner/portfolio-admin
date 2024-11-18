<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import ProjectCard from "@/Components/projects/ProjectCard.vue";
import {Head, usePage} from "@inertiajs/vue3";
import {computed, ref} from "vue";
const props = defineProps({
  projects: Object,
  categories: Object
});

const viewCategories = ref(false);

const page = usePage();


const flashMessage = computed(() => page.props.flash?.message || null);

</script>

<template>
    <Head title="Projects" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="mb-6"   v-if="!viewCategories">

                    <a

                        href="/projects/create"
                        class="bg-[#4d91de] text-white px-4 py-3 hover:bg-transparent border border-[#4d91de] mr-4"
                        >Add New Project</a
                    >

                  <button
                      @click.prevent="viewCategories = true"
                      class="bg-[#4d91de] text-white text-lg px-4 py-2 hover:bg-transparent hover:text-[#4d91de] border border-[#4d91de] ease-in-out ">
                    View Categories
                  </button>
                </div>
              <div class="mb-6" v-else>

                <a
                    disabled
                    href="/projects/create"
                    class="bg-gray-300 text-white px-4 py-3 hover:cursor-default hover:text-white  border border-[#4d91de] mr-4"
                >Add New Category (coming soon)</a
                >

                <button
                    @click.prevent="viewCategories = false"
                    class="bg-[#4d91de] text-white text-lg px-4 py-2 hover:bg-transparent hover:text-[#4d91de] border border-[#4d91de] ease-in-out ">
                  View Projects
                </button>
              </div>
                <div v-if="!viewCategories">
                  <div
                      class="overflow-hidden shadow-sm sm:rounded-lg"
                      v-if="projects.length > 0"
                  >
                      <div class="flex gap-2 flex-wrap h-screen w-full mx-auto">
                          <ProjectCard
                              v-for="project in projects"
                              key="project.id"
                              :project="project"
                          />
                      </div>
                  </div>
                  <div
                      class="flex w-full flex-col mt-40 justify-center items-center"
                      v-else
                  >
                      <img
                          src="https://icons.veryicon.com/png/o/miscellaneous/effevo/box-empty-1.png"
                          alt=""
                          srcset=""
                          width="200"
                      />
                      <h1 class="text-xl">Please Add your first project!</h1>
                  </div>
                </div>
                <div v-else>
                  <ul>
                    <li class="flex"  v-for="category in categories">
                      <div class="mr-2 capitalize  pr-2 border-r-2">{{category.name}}</div>
                      <div>
                        <a :href="`/categories/edit/${category.id}`">Edit</a>
                      </div>
                      <hr />
                    </li>
                  </ul>
                </div>
            </div>
        </div>
      <div v-if="flashMessage !== null" class="fixed bg-green-500 rounded bottom-10 right-0"  >
        <button
            @click.prevent="() => page.props.flash.message = null"
            class="rounded-full w-1 h-1 flex justify-center items-center p-4 bg-white border-gray-200 absolute -left-4 -top-4">
          X
        </button>
        <h4 class="text-white text-lg p-4">{{flashMessage}}</h4>

      </div>
    </AuthenticatedLayout>
</template>

