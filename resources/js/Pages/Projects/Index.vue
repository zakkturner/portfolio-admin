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
                <div class="mb-6">
                    <a
                        href="/projects/create"
                        class="bg-[#4d91de] text-white px-4 py-3 hover:bg-transparent border border-[#4d91de]"
                        >Add New Project</a
                    >
                </div>
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
        </div>
    </AuthenticatedLayout>
</template>
<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import ProjectCard from "@/Components/projects/ProjectCard.vue";
import { Head } from "@inertiajs/vue3";
const props = defineProps({ projects: Object });
</script>
