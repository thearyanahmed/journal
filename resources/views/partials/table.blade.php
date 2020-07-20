<table class="border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative">
    <thead>
    <tr class="text-left">
        <th class="py-2 font-normal w-6 sticky top-0 border-b border-gray-200 bg-gray-100">
            <label class="text-teal-500 inline-flex justify-between items-center hover:bg-gray-200 px-2 py-2 rounded-lg cursor-pointer">
                <input type="checkbox" class="form-checkbox focus:outline-none focus:shadow-outline">
            </label>
        </th>
        <th class="py-2 font-normal sticky top-0 border-b border-gray-200 bg-gray-100">#id</th>
        <th class="py-2 font-normal sticky top-0 border-b border-gray-200 bg-gray-100">name</th>
        <th class="py-2 font-normal sticky top-0 border-b border-gray-200 bg-gray-100">slug</th>
        <th class="py-2 font-normal sticky top-0 border-b border-gray-200 bg-gray-100">published at</th>
        <th class="py-2 font-normal sticky top-0 border-b border-gray-200 bg-gray-100">created at</th>
        <th class="py-2 font-normal sticky top-0 border-b border-gray-200 bg-gray-100">actions</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td class="w-6 border-dashed border-t border-gray-200">
            <label class="text-teal-500 inline-flex justify-between items-center hover:bg-gray-200 px-2 py-2 rounded-lg cursor-pointer">
                <input type="checkbox" class="form-checkbox rowCheckbox focus:outline-none focus:shadow-outline" :name="user.userId">
            </label>
        </td>
        <td>#id</td>
        <td>title</td>
        <td>slug</td>
        <td>published at</td>
        <td>created at</td>
        <td>actions</td>
    </tr>
    </tbody>
</table>
