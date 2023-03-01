import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { IonicModule } from '@ionic/angular';

import { ManageThunderPage } from './manage-thunder.page';

describe('ManageThunderPage', () => {
  let component: ManageThunderPage;
  let fixture: ComponentFixture<ManageThunderPage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ManageThunderPage ],
      imports: [IonicModule.forRoot()]
    }).compileComponents();

    fixture = TestBed.createComponent(ManageThunderPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
