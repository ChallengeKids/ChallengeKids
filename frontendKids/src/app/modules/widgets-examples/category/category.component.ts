import { Component } from '@angular/core';
import { TablesWidget13Component } from 'src/app/_metronic/partials/content/widgets/tables/tables-widget13/tables-widget13.component';
import { HttpserviceService } from '../../auth/services/httpservice.service';
import { lastValueFrom } from 'rxjs';

@Component({
  selector: 'app-category',
  templateUrl: './category.component.html',
})
export class CategoryComponent {
  showForm = false;
  title = '';
  desc = '';
  constructor(private httpservice: HttpserviceService) {}
  onAddCategory() {
    this.showForm = true;
  }
  async addCategory() {
    console.log(this.title, this.desc);
    try {
      const response = await lastValueFrom(
        this.httpservice.post('/api/category/new', {
          title: this.title,
          description: this.desc,
        })
      );
      if (response) {
        alert('ajout avec succe!');
        this.showForm = false;
        window.location.reload();
      }
    } catch (error) {
      console.error('Error fetching categories:', error);
    }
  }
}
