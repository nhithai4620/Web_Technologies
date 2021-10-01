<?php require "../bootstrap.php"; ?>
<?php
	use CT275\Lab4\Book;
	use CT275\Lab4\Author;
	
	if ($_SERVER['REQUEST_METHOD'] === 'POST')
	{
		$author = new Author($_POST);
		$author->save();
		
		$book = new Book($_POST);
		$author->books()->save($book);
	}
	
	$books = Book::all();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Books</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="//cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" rel="stylesheet">     
    <link href="/css/sticky-footer.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/animate.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

	<style>
		table, th, td {
			border: 1px solid black;
		}
		label{
			display:inline-block;
			width:150px;
		}	
	</style>
</head>
<body>

		<div class="container mt-5">
				<div class="card">
					<h2 class="card-header text-center">Add new book</h2>
					<div class="card-body">
						<form role="form" data-toggle="validator" method="POST">


							<div class="form-group">
								<label>Title:</label>
								<input class="form-control" data-error="You must have a title." name="title" placeholder="Enter title"
		type="text" required />
							</div>

							<div class="form-group">
								<label>Num of Pages:</label>
								<input class="form-control" data-error="You must have a pages" name="pages_count" placeholder="Number of pages"
		type="number" required />
							</div>

							<div class="form-group">
								<label>Price:</label>
								<input class="form-control" data-error="You must have a price." name="price" placeholder="Enter price"
		type="text" required />
							</div>


							<div class="form-group">
								<label>Description:</label>
								<input class="form-control" data-error="You must have a title." name="description" placeholder="Description"
		type="text" required />
							</div>

							<div class="form-group">
								<label>Author's First Name:</label>
								<input class="form-control" data-error="You must have a title." name="first_name" placeholder="Enter first name of author"
		type="text" required />
							</div>


							<div class="form-group">
								<label>Author's Last Name:</label>
								<input class="form-control" data-error="You must have a title." name="last_name" placeholder="Enter last name of author"
		type="text" required />
							</div>

							<div class="form-group">
								<label>Author's Email:</label>
								<input class="form-control" data-error="You must have a title." name="email" placeholder="Enter email of author"
		type="text" required />
							</div>


							<div class="form-group">
                        	<button class="btn btn-primary btn-block"  name="submit" type="submit">Send</button>
                    		</div>
						</form>
					</div>
				</div>
		</div>

	<h2 class="section-heading text-center wow fadeIn">List of books: </h2>

	<div class="inner-wrapper row">
		<div class="col-md-12">
			<!-- Table Starts Here -->
			<table id="books" class="table table-bordered table-responsive table-striped">
				<thead>
					<tr>
						<th>Title</th>
						<th>Num of Pages</th>
						<th>Price</th>
						<th>Description</th>
						<th>Author</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($books as $book): ?>
						<tr>
						<td><?=htmlspecialchars($book->title)?></td>
						<td><?=htmlspecialchars($book->pages_count)?></td>
						<td><?=htmlspecialchars($book->price)?></td>
						<td><?=htmlspecialchars($book->description)?></td>
						<td><?=htmlspecialchars($book->author->first_name . " " . $book->author->last_name 
						. " (" . $book->author->email . ")")?></td>
						<td><a href="/apps/lab4/www/edit-book.php?id=<?=htmlspecialchars($book->id)?>"
						class="btn btn-xs btn-warning">
						<i alt="Edit" class="fa fa-pencil"> Edit</i></a>
						<form class="delete" action="/apps/lab4/www/del-book.php"
							method="POST" style="display: inline;">
							<input type="hidden" name="id"
							value="<?=htmlspecialchars($book->id)?>">
							<button type="submit" class="btn btn-xs btn-danger"
							name="delete-contact">
							<i alt="Delete" class="fa fa-trash"> Delete</i></button>
						</form></td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
			<!-- Table Ends Here -->
		</div>
	</div>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <script src="./js/wow.min.js"></script>
	<script>
        $(document).ready(function(){
            new WOW().init();
            $('#books').DataTable({
				searching: false,
				lengthMenu:[5,10,20,"All"]
			});   

     
        });
    </script>

</body>
</html>


