import { Component } from "@angular/core";
import { HttpserviceService } from "../../auth/services/httpservice.service";
import { lastValueFrom } from "rxjs";
import {
  OnInit,
  AfterViewInit,
  ElementRef,
  ViewChild,
  TemplateRef,
  inject,
} from "@angular/core";
declare var $: any;
@Component({
  selector: "app-kid",

  templateUrl: "./kid.component.html",
})
export class KidComponent implements OnInit {
  kids: any;
  selectedkid: any;
  confirmPassword: any;
  constructor(private httpservice: HttpserviceService) {}
  @ViewChild("dataTable", { static: false }) tableElement: ElementRef;

  ngAfterViewInit() {
    $(this.tableElement.nativeElement).DataTable();
  }

  async ngOnInit() {
    try {
      const response = await lastValueFrom(this.httpservice.get("/api/kid"));
      this.kids = response;
      console.log("Categories loaded:", this.kids);
    } catch (error) {
      console.error("Error fetching categories:", error);
    }
  }

  async delete(id: any) {
    try {
      const response = await lastValueFrom(
        this.httpservice.delete(`/api/kid/delete/${id}`)
      );
      window.location.reload();
    } catch (error) {
      console.error("Error fetching categories:", error);
    }
  }
  savekid() {}
}
