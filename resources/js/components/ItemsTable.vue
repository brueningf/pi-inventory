<template>
    <div>
        <div class="flex">
            <button class="button field is-danger" @click="selected = null"
                    :disabled="!selected">
                <zondicon icon="close" class="w-4 fill-current text-white mr-1"></zondicon>
                <span>Clear selected</span>
            </button>

            <div class="flex-1 flex justify-end">
                <button class="button field is-info mr-3" @click="editSelected"
                        :disabled="!selected">
                    <zondicon icon="edit-pencil" class="w-4 fill-current text-white mr-1"></zondicon>
                    <span>Edit</span>
                </button>
                <button class="button field is-danger mr-3" @click="removeSelected"
                        :disabled="!selected">
                    <zondicon icon="trash" class="w-4 fill-current text-white mr-1"></zondicon>
                    <span>Delete</span>
                </button>
            </div>
        </div>

        <b-table
            :data="tableItems"
            :selected.sync="selected"
            :checked-rows.sync="checkedRows"
            :default-sort="['name', 'asc']"
            custom-row-key="id"
            detail-key="id"
            height="600"
            focusable
            sticky-header
        >

            <template slot-scope="props">
                <b-table-column field="image" label="Image">
                    <img :src="props.row.image_path" alt="" class="h-12 object-cover"
                         :class="{ 'h-24': selected === props.row }">
                </b-table-column>
                <b-table-column field="name" label="Name / Alias" sortable>
                    <a :href="props.row.path">
                        {{ props.row.name }}
                    </a>
                </b-table-column>

                <b-table-column field="description" label="Description" sortable>
                    {{ props.row.description }}
                </b-table-column>

                <b-table-column field="status" label="Status" sortable>
                    {{ props.row.status }}
                </b-table-column>
                <b-table-column field="total_stock" label="Stock" sortable>
                    {{ props.row.total_stock }}
                </b-table-column>
                <b-table-column field="price" label="Price" sortable numeric>
                    {{ props.row.price }}
                </b-table-column>

                <b-table-column field="marking_code" label="Marking" sortable>
                    {{ props.row.marking_code }}
                </b-table-column>
                <b-table-column field="item_case.name" label="Case" sortable>
                    <a :href="props.row.item_case.path">
                        {{ props.row.item_case.name }}
                    </a>
                </b-table-column>
                <b-table-column field="datasheet" label="Datasheet">
                    <a :href="props.row.datasheet_path" target="_blank"
                       @click.prevent="openDatasheet(props.row.datasheet_path)" v-if="props.row.datasheet">
                        <zondicon icon="book-reference"
                                  class="w-5 h-5 fill-current"></zondicon>
                    </a>
                    <zondicon icon="close"
                              class="w-5 h-5 fill-current" v-else></zondicon>
                </b-table-column>
                <b-table-column field="attributes" label="Attributes">
                    <div>
                        <span v-for="attribute in props.row.attributes">
                            {{ attribute.value }}
                        </span>
                    </div>
                </b-table-column>
            </template>

            <template slot="detail" slot-scope="props">
                {{ props.name }}
            </template>
            <template slot="empty">
                <section class="section">
                    <div class="content has-text-grey has-text-centered">
                        <p>Nothing here.</p>
                    </div>
                </section>
            </template>
        </b-table>
    </div>
</template>

<script>
    export default {
        name: 'ItemsTable',
        props: ['items'],
        data() {
            return {
                tableItems: [],
                checkedRows: [],
                selected: null
            }
        },
        mounted() {
            this.tableItems = this.items
        },
        methods: {
            openDatasheet(path) {
                window.open(path, '_blank', 'width=800,height=600')
            },
            editSelected() {

            },
            removeSelected(index) {
                swal.fire({
                    icon: 'warning',
                    title: 'Are you sure?',
                    text: 'You will not be able to recover this element!',
                    cancelButtonText: 'No, cancel it!',
                    confirmButtonText: 'Yes, I am sure!',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                }).then(result => {
                    if (result.value) {
                        let index = this.tableItems.findIndex(item => item.id === this.selected.id)
                        this.tableItems.splice(index, 1)

                        axios.delete('/items/' + this.selected.id).then(() => {
                            toast.fire({ title: 'Item ' + this.selected.name + ' was deleted', icon: 'success' })
                            this.selected = null

                        })
                    }
                })
            }
        }
    }
</script>

<style scoped>

</style>
