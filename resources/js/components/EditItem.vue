<template>
    <div class="px-5 py-4 bg-gray-600">
        <button class="px-3 py-2" :class="{ 'bg-blue-500 text-white': currentTab === 'general'}"
                @click="currentTab = 'general'">General
        </button>
        <button class="px-3 py-2" :class="{ 'bg-blue-500 text-white': currentTab === 'attributes'}"
                @click="currentTab = 'attributes'">Attributes
        </button>
        <button class="px-3 py-2" :class="{ 'bg-blue-500 text-white': currentTab === 'projects'}"
                @click="currentTab = 'projects'">Projects
        </button>
        <div v-show="currentTab === 'general'">
            <form class="w-full tw-only" @submit.prevent="submit" v-if="item">
                <div class="hidden sm:block mb-3 text-center font-bold text-xl" v-text="item.name"></div>
                <div class="flex flex-wrap mb-6">
                    <div class="w-full sm:w-1/2 pr-3 pb-2 text-left sm:pb-3">
                        <label>Name</label>
                        <input type="text" v-model="item.name" placeholder="e.g. Example item" required>
                    </div>
                    <div class="w-full sm:w-1/2 pr-3 pb-2 text-left sm:pb-3">
                        <label>Image</label>
                        <div class="flex items-center justify-start h-10 relative">
                            <input type="file" @change="setNewImage">
                            <img :src="item.image_path" alt="" style="height:100%;width:auto;">
                        </div>
                    </div>
                    <div class="w-1/2 sm:w-1/4 pr-3 pb-2 text-left sm:pb-3 relative">
                        <label>Category</label>
                        <select v-model="item.category_id" class="bg-white shadow px-3 py-2" required>
                            <option value="" disabled>Select a category</option>

                            <option v-for="category in availableCategories"
                                    :value="category.id" v-text="category.name"
                                    :selected="category.id === item.category_id">
                            </option>
                        </select>
                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-5 pt-8 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="w-1/2 sm:w-1/4 pr-3 pb-2 text-left sm:pb-3 relative">
                        <label>Item Case</label>
                        <select v-model="item.item_case_id" class="bg-white shadow px-3 py-2" required>
                            <option value="" disabled>Select an case</option>

                            <option v-for="itemCase in itemCases"
                                    :value="itemCase.id" v-text="itemCase.name"
                                    :selected="itemCase.id === item.item_case_id">
                            </option>
                        </select>
                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-5 pt-8 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="w-1/2 sm:w-1/4 pr-3 pb-2 text-left sm:pb-3 relative">
                        <label>Manufacturer</label>
                        <select v-model="item.manufacturer_id" class="bg-white shadow px-3 py-2" required>
                            <option value="" disabled>Select an case</option>

                            <option v-for="manufacturer in manufacturers"
                                    :value="manufacturer.id" v-text="manufacturer.name"
                                    :selected="manufacturer.id === item.manufacturer_id">
                            </option>
                        </select>
                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-5 pt-8 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                            </svg>
                        </div>
                    </div>

                    <div class="w-1/2 sm:w-1/4 pr-3 pb-2 text-left sm:pb-3">
                        <label>Provider code</label>
                        <input type="text" placeholder="e.g. STMM001" v-model="item.provider_code">
                    </div>
                    <div class="w-1/2 sm:w-1/4 pr-3 pb-2 text-left sm:pb-3">
                        <label>Marking Code</label>
                        <input type="text" v-model="item.marking_code">
                    </div>
                    <div class="w-1/2 sm:w-1/4 pr-3 pb-2 text-left sm:pb-3">
                        <label>Reference</label>
                        <input type="text" v-model="item.reference">
                    </div>
                    <div class="w-1/2 sm:w-1/4 pr-3 pb-2 text-left sm:pb-3">
                        <label>Price per unit $</label>
                        <input type="number" min="0.00" max="10000.00" step="0.01" placeholder="0.00"
                               v-model="item.price" required>
                    </div>
                    <div class="w-1/2 sm:w-1/4 pr-3 pb-2 text-left sm:pb-3">
                        <label>Weight</label>
                        <input type="number" min="0.00" max="10000.00" step="0.01" placeholder="0.00"
                               v-model="item.weight" required>
                    </div>
                </div>
                <div class="mb-6">
                    <label>Description</label>
                    <textarea v-model="item.description" rows="4"
                              placeholder="e.g. Fancy example item"></textarea>
                </div>

                <div class="mb-6">
                    <label>Datasheet Path</label>
                    <input type="text" placeholder="C:/Datasheets/ExampleItemDatasheet.pdf"
                           v-model="item.datasheet">
                </div>

                <div class="flex items-center mb-6">
                    <input style="margin-right: .5rem" type="checkbox" v-model="item.valid">
                    <label>Reviewed (Valid record)</label>
                </div>

                <div class="my-6">
                    <button class="btn bg-green-500 text-white hover:bg-green-400 mr-5" type="submit">Update item
                    </button>
                </div>
            </form>
        </div>
        <div style="min-height: 300px" v-show="currentTab === 'attributes'">
            <div class="mb-3 text-center font-bold text-3xl">Attributes of {{ item.name }}</div>

            <div class="w-1/2">
                <div class="flex items-center mb-2"
                     v-for="(attribute, index) in item.attributes">
                    <div class="flex items-center bg-gray-300 text-black px-3 py-2">
                        <span v-text="attribute.name"></span>:
                        <span class="ml-2" v-text="attribute.value"></span>
                    </div>
                    <span @click="removeAttribute(attribute, index)" title="Remove attribute"
                          class="cursor-pointer font-bold mx-3 text-2xl">&times;</span>
                </div>
            </div>
            <hr>
            <div>
                <div class="font-bold text-white text-normal sm:text-xl">
                    Add attribute
                </div>

                <add-attribute @attribute-added="attributeAdded"></add-attribute>
            </div>
        </div>
        <div style="min-height: 300px" v-if="currentTab === 'projects'">
            <div class="mb-3 text-center font-bold text-3xl">Projects associated with {{ item.name }}</div>
            <div class="flex items-center justify-start flex-wrap mb-2">
                <div class="flex items-center bg-gray-300 text-black px-3 py-2 mr-2 max-w-1/2"
                     v-for="(p, index) in item.projects"
                >
                    <span v-text="p.name"></span> <span @click="removeProject(p, index)"
                                                              title="Remove project"
                                                              class="cursor-pointer text-red-500 font-bold ml-3 text-2xl">&times;</span>
                </div>
            </div>
            <hr>
            <div>
                <div class="font-bold text-white text-normal sm:text-xl">
                    Associate with project
                </div>

                <form @submit.prevent="associateProject">
                    <label>
                        <select title="Project" class="w-1/2" v-model="project" required>
                            <option value="" selected disabled hidden>Choose a project</option>
                            <option v-for="p in availableProjects" :value="p.id" v-text="p.name"></option>
                        </select>
                    </label>

                    <button class="px-3 py-2 bg-blue-500 text-white" type="submit">Create association</button>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
import AddAttribute from './AddAttribute'

export default {
    props: ['data', 'availableCategories', 'itemCases', 'manufacturers', 'projects'],
    mounted() {
        this.item = this.data
    },
    data() {
        return {
            currentTab: 'general',
            item: false,
            newImage: null,
            project: ''
        }
    },
    components: { AddAttribute },
    computed: {
        availableProjects() {
            const projects = []

            this.projects.forEach((project) => {
                if(!this.item.projects.filter(p => p.id === project.id).length) {
                   projects.push(project)
                }
            })

            return projects
        }
    },
    methods: {
        async submit() {
            axios.patch('/items/' + this.item.id, {
                name: this.item.name,
                'provider_code': this.item.provider_code,
                'marking_code': this.item.marking_code,
                'price': this.item.price,
                'description': this.item.description,
                'datasheet': this.item.datasheet,
                'valid': this.item.valid,
                'category_id': this.item.category_id,
                'item_case_id': this.item.item_case_id,
                'manufacturer_id': this.item.manufacturer_id,
            }).then((response) => {
                toast.fire({ title: 'Item ' + this.item.name + ' was updated.', icon: 'success' })
            }).catch((error) => {
                toast.fire({ title: 'Request failed.', icon: 'error' })
            })

            if (this.newImage) {
                let data = new FormData()
                data.append('image', this.newImage)
                data.append('_method', 'PATCH')

                axios.post('/items/' + this.item.id, data).then(response => console.log(response))
            }

            this.$modal.hide('edit-item-' + this.item.id)
        },
        removeAttribute(attribute, index) {
            this.item.attributes.splice(index, 1)

            axios.delete('/api/attributes/' + attribute.id)
        },
        setNewImage(e) {
            let files = e.target.files || e.dataTransfer.files

            if (!files.length) return

            this.newImage = files[0]
        },
        attributeAdded(payload) {
            this.item.attributes.push(payload)
        },
        associateProject() {
            const projectIsAssociated = this.item.projects.find(el => el.id === this.project)
            if (projectIsAssociated) return

            const projectToBeAssociated = this.projects.find(el => el.id === this.project)
            this.item.projects.push(projectToBeAssociated)

            axios.post(`/api/add-project/${this.item.id}`, { project: this.project }).then(() => this.project = '')

            window.toast.fire({ title: 'Project ' + projectToBeAssociated.name + ' associated', icon: 'success' })
        },
        removeProject(project, index) {
            this.item.projects.splice(index, 1)

            axios.post('/api/delete-project/' + this.item.id, { project: project.id })

            window.toast.fire({ title: 'Project disassociated', icon: 'success' })
        },

    }
}
</script>
<style>
.modal-component {
    width: 70% !important;
}

@media (max-width: 768px) {
    .modal-component {
        width: 80% !important;
    }

    label {
        font-size: .6rem;
        margin-bottom: .1rem;
    }
}
</style>
