import { Component, EventEmitter, OnInit, Output } from '@angular/core';
import { HttpserviceService } from 'src/app/modules/auth/services/httpservice.service';
import { lastValueFrom, Observable } from 'rxjs';
import { CommonModule } from '@angular/common';

@Component({
  selector: 'app-tables-widget13',
  templateUrl: './tables-widget13.component.html',
})
export class TablesWidget13Component implements OnInit {
  title = '';
  desc = '';
  categories: any;
  constructor(private httpservice: HttpserviceService) {}
  @Output() addCategoryEvent = new EventEmitter<void>();
  async ngOnInit() {
    try {
      const response = await lastValueFrom(
        this.httpservice.get('/api/category')
      );
      this.categories = response;
      console.log('Categories loaded:', this.categories);
    } catch (error) {
      console.error('Error fetching categories:', error);
    }
  }
  async delete(id: any) {
    try {
      const response = await lastValueFrom(
        this.httpservice.delete(`/api/category/delete/${id}`)
      );
      window.location.reload();
    } catch (error) {
      console.error('Error fetching categories:', error);
    }
  }
  add() {
    console.log('emitting');
    this.addCategoryEvent.emit();
  }
}
