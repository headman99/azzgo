import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { IonicModule } from '@ionic/angular';

import { ManagePublisherPage } from './manage-publisher.page';

describe('ManagePublisherPage', () => {
  let component: ManagePublisherPage;
  let fixture: ComponentFixture<ManagePublisherPage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ManagePublisherPage ],
      imports: [IonicModule.forRoot()]
    }).compileComponents();

    fixture = TestBed.createComponent(ManagePublisherPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
