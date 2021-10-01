<?php require "../bootstrap.php"; ?>
<?php
    header('location:books.php');
    use CT275\Lab4\Book;
    if ($_SERVER['REQUEST_METHOD'] == 'POST'
    && isset($_POST['id'])
    && ($book = Book::find($_POST['id'])) !== null) {
    $book->delete();
}
redirect('/books.php');
