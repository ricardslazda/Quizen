<?php
/**
 * @var $name string|null
 * @var array $quizzes
 */


?>
<quiz :name-prop='<?= json_encode($name) ?>':quizzes-prop='<?= json_encode($quizzes)?>'>
</quiz>