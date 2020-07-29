import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import {HomeComponent} from './component/home/home.component';
import { AddCardComponent } from './containers/add-card/add-card.component';
import { DetailComponent } from './component/detail/detail.component';
import { UpdateCardComponent } from './containers/update-card/update-card.component';

const routes: Routes = [
  {path: '', component: HomeComponent},
  {path: 'add', component: AddCardComponent},
  {path: 'detail/:id', component: DetailComponent},
  {path: 'update/:id', component: UpdateCardComponent}

];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
