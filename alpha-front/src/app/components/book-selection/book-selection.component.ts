import { Component, OnInit } from '@angular/core';
import { BooksService } from '../../services/books.service';
import { Books } from '../../interfaces/books';

@Component({
  selector: 'app-book-selection',
  templateUrl: './book-selection.component.html',
  styleUrls: ['./book-selection.component.sass'],
})
export class BookSelectionComponent implements OnInit {
  books: Books[];

  constructor(private booksService: BooksService) {
    this.books = [];
  }
  ngOnInit(): void {
    this.booksService.bookList().subscribe((librairy) => {
      this.books = librairy;
    });
  }
}
