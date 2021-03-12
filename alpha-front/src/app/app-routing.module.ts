import { NgModule, Component } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { BookSelectionComponent } from './components/book-selection/book-selection.component';

const routes: Routes = [
  { path: 'book-selection', component: BookSelectionComponent },
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule],
})
export class AppRoutingModule {}
