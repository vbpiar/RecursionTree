<?php

/**
 * Use this method to create a one level array with param parent_id , id
 * to multi level hierarchy array . If you need to create a  hierarchy array
 * from a certain parent id , you can change param $parentID when calling
 * makeTree for needed.
 *
 * @param array $inputArray
 * @param int $parentID = 0
 *
 * @return array
 */

function makeTree(array $inputArray,$parentID = 0) {

    $outputArray = [];

    foreach ($inputArray as $item) {

        if ($item['parent_id'] == $parentID) {

            $children = makeTree($inputArray,$item['id']);

            if (isset($children)) {

                $item['children'] = $children;

                $outputArray[] = $item;
            }

        }
    }
    return $outputArray;
}

$test_array = [
    ['id' => 1, 'name' => 'Jhon', 'parent_id' => 0],
    ['id' => 2, 'name' => 'Mike', 'parent_id' => 1],
    ['id' => 3, 'name' => 'Den', 'parent_id' => 1],
    ['id' => 4, 'name' => 'Ivan', 'parent_id' => 2],
    ['id' => 5, 'name' => 'Taras', 'parent_id' => 3],
    ['id' => 6, 'name' => 'Olga', 'parent_id' => 4],
    ['id' => 7, 'name' => 'Darya', 'parent_id' => 5],
    ['id' => 8, 'name' => 'Viktoriya', 'parent_id' => 0],
];



$tree = makeTree($test_array);
print_r($tree);

