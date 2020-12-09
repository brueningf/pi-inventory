<template>
    <div>
        <div class="flex">
            <button class="button field is-danger" @click="selected = null"
                    :disabled="!selected">
                <zondicon icon="close" class="w-4 fill-current text-white mr-1"></zondicon>
                <span>Clear selected</span>
            </button>

            <div class="flex-1 flex justify-end">
                <a class="button field is-info" style="margin-right: 1rem"
                   :href="selected ? `/items/${selected.id}/edit` : '#'"
                   :disabled="!selected">
                    <zondicon icon="browser-window-open" class="w-4 fill-current text-white mr-1"></zondicon>
                    <span>Edit</span>
                </a>
                <button class="button field is-info" style="margin-right: 1rem" @click="editSelected"
                        :disabled="!selected">
                    <zondicon icon="edit-pencil" class="w-4 fill-current text-white mr-1"></zondicon>
                    <span>Quick Edit</span>
                </button>
                <button class="button field" :class="{ 'is-success': isRecordValid, 'is-warning': !isRecordValid }"
                        style="margin-right: 1rem" @click="toggleValidateRecord"
                        :disabled="!selected">
                    <zondicon :icon="isRecordValid ? 'checkmark-outline' : 'exclamation-outline'"
                              class="w-4 fill-current text-white mr-1"></zondicon>
                    <span v-text="isRecordValid ? 'Approved' : 'Mark as valid'"></span>
                </button>
                <button class="button field is-danger" @click="removeSelected"
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
            @details-open="(row, index) => $root.toast.fire({ title: `Expanded ${row.name}`, icon: 'info' })"
            height="600"
            @dragstart="dragstart"
            @drop="drop"
            @dragover="dragover"
            @dragleave="dragleave"
            detailed
            focusable
            sticky-header
        >

            <template slot-scope="props">
                <b-table-column field="image" label="Image">
                    <div>
                        <a @click.prevent="openImageModal(`item-image-${props.row.id}`)" class="cursor-pointer">
                            <img :src="props.row.image_path" alt="" class="w-12 h-12 object-cover"
                                 :class="{ 'w-16 h-16': selected === props.row }">
                        </a>
                        <modal :name="`item-image-${props.row.id}`">
                            <div>
                                <img :src="props.row.image_path" alt="" width="400" height="auto" class="block mx-auto my-0">
                            </div>
                        </modal>
                        <modal :name="`edit-item-${props.row.id}`">
                            <edit-item
                                :data="props.row"
                                :manufacturers="manufacturers"
                                :item-cases="cases"
                                :available-categories="categories"
                            ></edit-item>
                        </modal>
                    </div>
                </b-table-column>
                <b-table-column field="name" label="Name / Alias" sortable>
                    <a :href="props.row.path" class="flex items-center justify-between">
                        <span>{{ props.row.name }}</span>
                        <zondicon :icon="props.row.valid ? 'checkmark-outline' : 'exclamation-outline'"
                                  class="w-5 h-5 fill-current mr-1"
                                  :class="{'text-green-500': props.row.valid, 'text-yellow-500': ! props.row.valid}"></zondicon>
                    </a>
                </b-table-column>

                <b-table-column field="description" label="Description" sortable>
                   <div>
                       {{ props.row.description }}
                   </div>
                </b-table-column>

                <b-table-column field="marking_code" label="Marking" sortable>
                    {{ props.row.marking_code }}
                </b-table-column>
                <b-table-column field="item_case.name" label="Case" sortable>
                    <a :href="props.row.item_case.path">
                        {{ props.row.item_case.name }}
                    </a>
                </b-table-column>
                <b-table-column field="attributes" label="Attributes">
                    <div>
                        <span v-for="attribute in props.row.attributes">
                            {{ attribute.value }}
                        </span>
                    </div>
                </b-table-column>

                <b-table-column field="total_stock" label="Stock" width="20" sortable>
                    {{ props.row.status }} / {{ props.row.total_stock }}
                </b-table-column>
                <b-table-column field="price" label="Price" sortable numeric>
                    {{ props.row.price }}
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

            </template>

            <template slot="detail" slot-scope="props">
                <div class="storage-details">
                    <stock :locations="props.row.storage_locations" :item-id="props.row.id"
                           @stock-change="stockChange(props.index)"></stock>
                </div>
            </template>
            <template slot="empty">
                <section class="section">
                    <div class="content has-text-grey has-text-centered">
                        <p>Nothing here.</p>
                    </div>
                </section>
            </template>
        </b-table>

       <div class="flex items-center justify-between mt-2 p-2 bg-gray-600">
           <div>
               <a href="#top">Back to top of page</a>
           </div>
           <div>
              Items: {{ tableItems.length }}
           </div>
       </div>
    </div>
</template>

<script>
export default {
    name: 'ItemsTable',
    props: ['items', 'categories', 'cases', 'manufacturers'],
    data() {
        return {
            tableItems: [],
            checkedRows: [],
            selected: null,
            draggingRow: null,
            draggingRowIndex: null
        }
    },
    computed: {
        isRecordValid() {
            return this.selected ? this.selected.valid : false
        }
    },
    mounted() {
        this.tableItems = this.items
    },
    methods: {
        openDatasheet(path) {
            window.open(path, '_blank', 'width=800,height=600')
        },
        openImageModal(name) {
            this.$modal.show(name)
        },
        editSelected() {
            this.$modal.show(`edit-item-${this.selected.id}`)
        },
        toggleValidateRecord() {
            this.selected.valid = !this.selected.valid
            axios.patch('/items/' + this.selected.id, { valid: this.selected.valid })

            window.toast.fire({
                title: `Record valid state is now set to ${this.selected.valid}`,
                icon: 'info'
            })
        },
        stockChange(index) {
            console.log(index)
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
        },
        dragstart(payload) {
            this.draggingRow = payload.row
            this.draggingRowIndex = payload.index
            payload.event.dataTransfer.effectAllowed = 'copy'
        },
        dragover(payload) {
            payload.event.dataTransfer.dropEffect = 'copy'
            payload.event.target.closest('tr').classList.add('is-selected')
            payload.event.preventDefault()
        },
        dragleave(payload) {
            payload.event.target.closest('tr').classList.remove('is-selected')
            payload.event.preventDefault()
        },
        drop(payload) {
            payload.event.target.closest('tr').classList.remove('is-selected')
            const droppedOnRowIndex = payload.index
            this.tableItems[this.draggingRowIndex].sort_number = this.tableItems[droppedOnRowIndex].sort_number + 1
            window.toast.fire({
                title: `Moved ${this.draggingRow.name} from row ${this.draggingRowIndex + 1} to ${droppedOnRowIndex + 1}`,
                icon: 'info'
            })
        }

    }
}
</script>

<style scoped>

</style>
