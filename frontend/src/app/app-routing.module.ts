import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import {HomeComponent} from './component/home/home.component';
import { AddCardComponent } from './containers/add-card/add-card.component';

const routes: Routes = [
  {path: '', component: HomeComponent},
  {path: 'add', component: AddCardComponent}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
