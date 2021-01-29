<div class="bulma w-full overflow-x-auto">
    <items-table
        :items="{{ $items->toJson() }}"
        :manufacturers="{{ $manufacturers->toJson() }}"
        :cases="{{ $itemCases->toJson() }}"
        :categories="{{ $availableCategories->toJson() }}"
        :projects="{{ $projects->toJson() }}"
    ></items-table>
</div>
