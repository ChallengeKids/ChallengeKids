import { Component, OnInit, AfterViewInit, ElementRef, ViewChild, TemplateRef, inject, } from "@angular/core";
import { CoachService } from "./services/coach.service";
import { ModalDismissReasons, NgbModal } from "@ng-bootstrap/ng-bootstrap";
declare var $: any;

@Component({
  selector: "app-coach",
  templateUrl: "./coach.component.html",
})

export class CoachComponent implements OnInit, AfterViewInit {
  public coaches: any;
  public isEditing: boolean = false;
  public selectedCoach: any = null;
  public confirmPassword: string = "";
  private modalService = inject(NgbModal);
  closeResult = "";

  @ViewChild("dataTable", { static: false }) tableElement: ElementRef;

  constructor(private coachService: CoachService) {}

  ngOnInit() {
    this.loadCoaches();
  }

  ngAfterViewInit() {
    $(this.tableElement.nativeElement).DataTable();
  }

  loadCoaches() {
    this.coachService.getCoaches().subscribe(
      (data) => {
        this.coaches = data;
        console.log("Coach data:", this.coaches); // Logs the coach data to the console
      },
      (err) => {
        console.log("Error fetching coaches:", err);
      }
    );
  }

  deleteCoach(id: number) {
    this.coachService.deleteCoach(id).subscribe(
      () => {
        this.coaches = this.coaches.filter((coach) => coach.id !== id);

        console.log(`Coach with ID ${id} deleted`);

        alert("Coach deleted successfully!");

        window.location.reload();
      },
      (err) => {
        console.log("Error deleting coach:", err);

        alert("Error deleting coach. Please try again later.");
      }
    );
  }

  saveCoach() {
    if (this.selectedCoach.password !== this.confirmPassword) {
      alert("Passwords do not match!");
      return;
    }

    const { confirmPassword, ...coachData } = this.selectedCoach; // Exclude confirmPassword

    this.coachService.updateCoach(coachData).subscribe(
      () => {
        const index = this.coaches.findIndex(
          (c) => c.id === this.selectedCoach.id
        );
        if (index > -1) {
          this.coaches[index] = this.selectedCoach;
        }
        this.selectedCoach = null;
        this.confirmPassword = "";
        alert("Coach updated successfully!");
        window.location.reload();
      },
      (err) => {
        console.error("Error updating coach:", err);
        alert("Error updating coach. Please try again later.");
      }
    );
  }

  open(content: TemplateRef<any>, coach: any) {
    this.selectedCoach = { ...coach };
    this.confirmPassword = "";
    this.modalService
      .open(content, {
        ariaLabelledBy: "modal-basic-title",
        centered: true,
        size: "lg",
      })
      .result.then(
        (result) => {
          this.closeResult = `Closed with: ${result}`;
        },
        (reason) => {
          this.closeResult = `Dismissed ${this.getDismissReason(reason)}`;
        }
      );
  }

  private getDismissReason(reason: any): string {
    switch (reason) {
      case ModalDismissReasons.ESC:
        return "by pressing ESC";
      case ModalDismissReasons.BACKDROP_CLICK:
        return "by clicking on a backdrop";
      default:
        return `with: ${reason}`;
    }
  }
}
