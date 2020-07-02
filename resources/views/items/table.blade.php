<div class="bulma w-full overflow-x-auto">
    <items-table
        :items="{{ $items->toJson() }}"
        :manufacturers="{{ $manufacturers->toJson() }}"
        :cases="{{ $itemCases->toJson() }}"
        :categories="{{ $availableCategories->toJson() }}"
    ></items-table>
</div>
