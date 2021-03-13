import { Component, OnInit, Input } from '@angular/core';
import { Books } from '../../interfaces/books';

@Component({
  selector: 'app-book-card',
  templateUrl: './book-card.component.html',
  styleUrls: ['./book-card.component.sass'],
})
export class BookCardComponent implements OnInit {
  constructor() {}

  ngOnInit(): void {}

  @Input() book: Books;
  @Input() images: string;
}
