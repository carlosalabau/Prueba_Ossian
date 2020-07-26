import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import {HomeComponent} from './component/home/home.component';
import { AddCardComponent } from './containers/add-card/add-card.component';
import { DetailComponent } from './component/detail/detail.component';

const routes: Routes = [
  {path: '', component: HomeComponent},
  {path: 'add', component: AddCardComponent},
  {path: 'detail/:id', component: DetailComponent}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
